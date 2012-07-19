<?php
/**
 *  MODOS DE USO
 * 
 *  Requerimiento: Se necesita tener un usuario logueado
 *
 */

class mdGenericPaymentHandler
{
  // Metodos de pago disponibles
  const ABITAB          = 'abitab';

  const GIRO_BANCARIO   = 'giro';

  const WESTERN         = 'western';
  
  const PAYPAL          = 'paypal';
  
  const TARJETA         = 'tarjeta';
  
  const OTRO            = 'otro';
  
  // Configuracion de los metodos de pago
  private static $paypal         = true;
  
  private static $giro           = false;
  
  private static $otro           = false;
  
  private static $tarjeta        = false;
  
  private static $western        = true;

  private static $abitab         = true;  
  
  public static $methods = array(
    0 => self::PAYPAL,
    1 => self::TARJETA,
    2 => self::GIRO_BANCARIO,
    3 => self::WESTERN,
    4 => self::OTRO,
    5 => self::ABITAB    
  );  
  
  // Estados posibles de los pagos
  
  // Cuando se registra un pago pasa a estado 0 (inicializado)
  const STATUS_INITIALIZE = 0;
  
  // Cuando el usuario confirma la compra e ingresa el codigo pasa a estado pendiente (pending)
  // En este estado se esta hasta que un administrador valide la transaccion desde el backend
  const STATUS_PENDING    = 1;
  
  // La venta quedo confirmada y finalizada por el adminirtador
  const STATUS_ACCEPTED   = 2;
  
  // La venta fue rechazada por el administrador
  const STATUS_REJECTED   = 3;
  
  public static $status = array(
    0 => self::STATUS_INITIALIZE,
    1 => self::STATUS_PENDING,
    2 => self::STATUS_ACCEPTED,
    3 => self::STATUS_REJECTED
  );
  
  private $mdPassport   = NULL;
  
  private $mdGenericSale = NULL;
  
  public function __construct($mdPassport = null) 
  {
		if($mdPassport == null)
    	$this->mdPassport = sfContext::getInstance()->getUser()->getMdPassport();  
  }
  
  public static function startPayment($method, $price, $options = array())
  {
		if(isset($options['mdPassport'])){
			$mdPassport = $options['mdPassport'];
		}else{
			$mdPassport = null;
		}
    $handler = new mdGenericPaymentHandler($mdPassport);
    switch ($method)
    {
      case self::ABITAB:
          $handler->startAbitab($price, $options);
        break;
      case self::GIRO_BANCARIO:
          $handler->startGiro($price, $options);
        break;      
      case self::WESTERN:
          $handler->startWestern($price, $options);
        break;
      case self::PAYPAL:
          $handler->startPaypal($price, $options);
        break;
      case self::OTRO:
          $handler->startOtro($price, $options);
        break;
      default:
        return false;
        break;
    }
    unset ($handler);
    return true;
  }

  /**
   *
   * @param GIRO_BANCARIO | ABITAB | WESTERN $method
   * @param mdGenericSale $mdGenericSale
   * @param mdGenericPaymentAbitab | mdGenericPaymentGiroBancario | mdGenericPaymentWestern $object
   * @param array $options
   * @return void 
   */
  public static function finishPayment($method, $mdGenericSale, $options = array())
  {
    $handler = new mdGenericPaymentHandler();
    $handler->mdGenericSale = $mdGenericSale;
    
    switch ($method)
    {
      case self::ABITAB:
          return $handler->finishAbitab($options);
        break;
      case self::GIRO_BANCARIO:
          return $handler->finishGiro($options);
        break;      
      case self::WESTERN:
          return $handler->finishWestern($options);
        break;
      case self::PAYPAL:
          return $handler->finishPaypal($options);
        break;
      default:
        return false;
        break;
    }
    unset ($handler);
  }
  
  /**
   *
   * @param type $paymentId
   * @param type $status 
   */
  public static function processResponse($paymentId, $status)
  {
    if(array_key_exists($status, self::$status))
    {
      $mdSale = Doctrine::getTable("mdGenericSale")->find($paymentId);
      $mdSale->setStatus($status);
      $mdSale->save();
      
      // Obtenemos todos los items y los activamos
      if($status == self::STATUS_ACCEPTED)
      {
        $items = $mdSale->getMdGenericSaleItem();
        foreach($items as $item)
        {
          $mdObject = Doctrine::getTable($item->getObjectClass())->find($item->getObjectId());
          if(method_exists($mdObject, 'activate'))
          {
            $mdObject->activate();
          }
        }        
      }
      
      mdGenericSaleMailingHandler::sendSaleConfirmMail($mdSale);
    }
  }


  private function saveSale($classMethod, $price, $status = NULL, $objects = array())
  {
    $conn = Doctrine_Manager::connection();

    $md_user_id = sfContext::getInstance()->getUser()->getMdUserId();

    try
    {
      $conn->beginTransaction();
      
      // Creamos el tipo de pago concreto
      $mdPaymentMethod = new $classMethod();
      $mdPaymentMethod->save($conn);

      // Creamos el pago
      $mdPayment = new mdGenericPayment();
      $mdPayment->setObjectId($mdPaymentMethod->getId());
      $mdPayment->setObjectClass($mdPaymentMethod->getObjectClass());
      $mdPayment->save($conn);
      
      $mdSale = new mdGenericSale();
      $mdSale->setMdPaymentId($mdPayment->getId());
      $mdSale->setMdUserId($md_user_id);
      $mdSale->setPrice($price);
      if(!is_null($status))
      {
        $mdSale->setStatus($status);        
      }
      $mdSale->save($conn);

      // Creamos los contenidos asociados a la venta
      foreach($objects as $object)
      {
				if(is_object($object)){
					$obj['object_id'] = $object->getId();
					$obj['object_class'] = get_class($object);
				}else{
					$obj = $object;
				}
        $mdGenericSaleItem = new mdGenericSaleItem();
        $mdGenericSaleItem->setObjectId($obj['object_id']);
        $mdGenericSaleItem->setObjectClass($obj['object_class']);
        $mdGenericSaleItem->setMdGenericSaleId($mdSale->getId());
        $mdGenericSaleItem->save();
      }
      
      $this->mdGenericSale = $mdSale;
      
      $conn->commit();
      return true;
    }catch (Exception $e){
    
      $conn->rollBack();
      throw $e;
      
    }
  }
  
  /**
   * Actualiza el estado de la venta
   * en el payment
   * 
   * @param int $status
   * @return boolean
   */
  private function updateSale($status)
  {
    $this->mdGenericSale->setStatus($status);
    $this->mdGenericSale->save();
  }

  /**
   * Comienza una transaccion western union
   * 
   * @param type $options
   *  is_ajax => true | false
   *  objects => array
   *                [0] => array
   *                        [object_id] => xx
   *                        [object_class] => xx
   *                [1] => array
   *                        [object_id] => xx
   *                        [object_class] => xx
   * 
   * @return bool en caso de estar la opcion is_ajax en true
   *         sino navega 
   */
  private function startWestern($price, $options = array())
  {
    $this->saveSale('mdGenericPaymentWestern', $price, 0, $options['objects']);

    mdGenericSaleMailingHandler::sendNewAdminMail($this->mdGenericSale);

    mdGenericSaleMailingHandler::sendSaleMail(mdGenericPaymentHandler::WESTERN, $this->mdPassport, $this->mdGenericSale, $options);

    $this->endTransaction(mdGenericPaymentHandler::WESTERN, $options);
  }

  private function startGiro($price, $options = array())
  {
    $this->saveSale('mdGenericPaymentGiroBancario', $price, 0, $options['objects']);

    mdGenericSaleMailingHandler::sendNewAdminMail($this->mdGenericSale);

    mdGenericSaleMailingHandler::sendSaleMail(mdGenericPaymentHandler::GIRO_BANCARIO, $this->mdPassport, $this->mdGenericSale);

    $this->endTransaction(mdGenericPaymentHandler::GIRO_BANCARIO, $options);
  }

  private function startAbitab($price, $options = array())
  {
    $this->saveSale('mdGenericPaymentAbitab', $price, 0, $options['objects']);

    mdGenericSaleMailingHandler::sendNewAdminMail($this->mdGenericSale);

    mdGenericSaleMailingHandler::sendSaleMail(mdGenericPaymentHandler::ABITAB, $this->mdPassport, $this->mdGenericSale);

    $this->endTransaction(mdGenericPaymentHandler::ABITAB, $options);
  }
  
  private function startOtro($price, $options = array())
  {
    $this->saveSale('mdGenericPaymentOther', $price, 1, $options['objects']);

    mdGenericSaleMailingHandler::sendNewAdminMail($this->mdGenericSale);

    mdGenericSaleMailingHandler::sendSaleMail(mdGenericPaymentHandler::OTRO, $this->mdPassport, $this->mdGenericSale);

    $this->endTransaction(mdGenericPaymentHandler::OTRO, $options);
  }
  
  private function startPaypal($price, $options = array())
  {
    $this->saveSale('mdGenericPaymentPaypal', $price, 0, $options['objects']);

    sfContext::getInstance()->getConfiguration()->loadHelpers(array('Url', 'I18N'));

    $expressCheckout = new Md_Express_Checkout();
    $expressCheckout->setReturnUrl(url_for('@paypalReturnUrl', true) . '?PAYMENTACTION=Sale&SALE=' . $this->mdGenericSale->getId() . ((array_key_exists('track', $options)) ? '&track=' . $options['track'] : ''));
    $expressCheckout->setCancelUrl(url_for('@paypalCancelUrl', true).'?SALE='.$this->mdGenericSale->getId());
    //$expressCheckout->setLocaleCode('');  TODO

    $curreny = "USD";
    if(isset($options['currency']) && !empty($options['currency']))
    {
      $curreny = $options['currency'];
    }
    
    $options = array(
        'SHIPDISCAMT'   => 0,
        'DESC'          => __('Mensajes_Description Paypal'),
        'PAYMENTACTION' => 'Sale',
        'CURRENCYCODE'  => $curreny
    );
    // 'CURRENCYCODE'  => 'EUR'
    $expressCheckout->addPaymentDetail($options);

    // Agrego los Items, van a ser 2, el aparato y la primera carga
    $options = array(
        'NAME'  => __('Mensajes_Name item Paypal'),
        'DESC'  => __('Mensajes_Desc item Paypal'),
        'AMT'   => $price,
        'QTY'   => 1
    );
    $expressCheckout->addPaymentDetailsItem($options);

    $response = $expressCheckout->setExpressCheckout();

    sfContext::getInstance()->getLogger()->log('PAYPAL::sale - call setExpressCheckout ' . serialize($response));            
    
    //mdGenericSaleMailingHandler::sendNewAdminMail($this->mdGenericSale);

    //mdGenericSaleMailingHandler::sendSaleMail(mdGenericPaymentHandler::PAYPAL, $this->mdPassport, $this->mdGenericSale);

    //$this->endTransaction(mdGenericPaymentHandler::PAYPAL, $options);
  }
  
  private function finishWestern($options = array())
  {
    $this->updateSale(1);

    mdGenericSaleMailingHandler::sendConfirmAdminMail($this->mdGenericSale);
  }

  private function finishGiro($options = array())
  {
    $this->updateSale(1);

    mdGenericSaleMailingHandler::sendConfirmAdminMail($this->mdGenericSale);
  }

  private function finishAbitab($options = array())
  {
    $this->updateSale(1);

    mdGenericSaleMailingHandler::sendConfirmAdminMail($this->mdGenericSale);
  }
  
  private function finishPaypal($options = array())
  {
    
    $token = $options['token'];
    $paymentaction = $options['paymentaction'];
    
    sfContext::getInstance()->getConfiguration()->loadHelpers(array('I18N'));
        
    $expressCheckout = new Md_Express_Checkout();
    $expressCheckout->setToken($token);

    sfContext::getInstance()->getLogger()->log('PAYPAL::commitTransaction - token ' . $token);

    $details = $expressCheckout->getExpressCheckoutDetails();

    // if(!$details) return false; manejar este error ?

    // Requerido para el doExpressCheckoutPayment, lo agregamos a prepo
    $details['PAYMENTACTION'] = $paymentaction;

    sfContext::getInstance()->getLogger()->log('PAYPAL::commitTransaction - call getExpressCheckoutDetails ' . serialize($details));

    sfContext::getInstance()->getLogger()->log('PAYPAL::commitTransaction - call doExpressCheckoutPayment');

    $response = $expressCheckout->doExpressCheckoutPayment($details);

    sfContext::getInstance()->getLogger()->log('PAYPAL::commitTransaction - response ' . serialize($response));

    if($response)
    {
      $this->updateSale(2);
      
      // Obtenemos todos los items y los activamos
      $items = $this->mdGenericSale->getMdGenericSaleItem();
      foreach($items as $item)
      {
        $mdObject = Doctrine::getTable($item->getObjectClass())->find($item->getObjectId());
        if(method_exists($mdObject, 'activate'))
        {
          $mdObject->activate();
        }
      }
    	//mdGenericSaleMailingHandler::sendConfirmAdminMail($this->mdGenericSale);
      return true;
    }
    else
    {
        sfContext::getInstance()->getLogger()->log('PAYPAL::commitTransaction - no se ha podido realizar la venta');
        return false;
    }    
  }  

  private function endTransaction($method, $options = array())
  {
    if(array_key_exists('is_ajax', $options) && $options['is_ajax'])
    {
      return true;
    }
    else
    {
      header("Location: " . url_for('saleSecure/finish' . ucfirst($method), true));                

      exit();
    }
  }
  
  public static function isAvailable($method)
  {
    switch ($method)
    {
      case self::PAYPAL:
        return self::$paypal;
        break;
      case self::GIRO_BANCARIO:
        return self::$giro;
        break;
      case self::OTRO:
        return self::$otro;
        break;
      case self::TARJETA:
        return self::$tarjeta;
        break;
      case self::WESTERN:
        return self::$western;
        break;
      case self::ABITAB:
        return self::$abitab;
        break;      
      default:
        return false;
        break;
    }
  }
  
  /**
   * Devuelve el estado del ultimo pago realizado por el objeto $mdObject.
   * Si no tiene pago asociado devuelve -1
   * 
   * @param mdContentConcrete $mdObject
   * @return boolean
   */
  public static function getPaymentStatus($mdObject)
  {
    $mdGenericSale = Doctrine::getTable('mdGenericSale')->getGenericSale($mdObject);
    if(!$mdGenericSale) return -1;
    return $mdGenericSale->getStatus();
  }
  
  /**
   * Devuelve el metodo (nombre de la clase) del ultimo pago realizado por el objeto $mdObject.
   * Si no tiene pago asociado devuelve NULL
   * @param mdObject $mdObject
   * @return string
   */
  public static function getPaymentMethod($mdObject)
  {
    $mdGenericSale = Doctrine::getTable('mdGenericSale')->getGenericSale($mdObject);
    if(!$mdGenericSale) return NULL;
    return $mdGenericSale->getMdGenericPayment()->getObjectClass();
  }
}
