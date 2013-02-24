<?php

/**
 * reservas actions.
 *
 * @package    rentNchill
 * @subpackage reservas
 * @author     maui
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class reservasActions extends sfActions {

    private $metaDebug = false;
    
    public function postExecute() {
        parent::postExecute();
        if(!$this->getRequest()->isXmlHttpRequest())
        {
          mdMetaTagsHandler::addGenericMetas($this, null, array('debug'=>$this->metaDebug));
        }
    }  
  /**
   * Executes index action
   *
   * @param sfRequest $request A request object
   */
  public function executeIndex(sfWebRequest $request) {
    $params = array();
    mdMetaTagsHandler::addMetas($this,'Reserva', array('params'=>$params, 'debug'=>$this->metaDebug));
    $values = $this->getUser()->getAttribute('reserva_values');
    $this->depto = Doctrine::getTable('mdApartamento')->find($values['md_apartamento_id']);
    $this->values = $values;
    //var_dump($values);die;
    $this->noches = count(mdBasicFunction::makeDayArray($values['fecha_desde'], $values['fecha_hasta'])) - 1;
  }

  public function executePay($request) {

    $values = $this->getUser()->getAttribute('reserva_values');

    $total = $values['total'];
    if($values["md_currency_id"] !=  mdCurrencyHandler::getCurrent()->getId())
    {
      $total = mdApartamento::calculatePriceOfConversion($values['total'], mdCurrencyHandler::getCurrent(), $values["md_currency_id"]);
    }
    $reserva = new mdReserva();
    $reserva->setmdApartamentoId($values['md_apartamento_id']);
    $reserva->setmdUserId($this->getUser()->getMdUserId());
    $reserva->setFechaDesde($values['fecha_desde']);
    $reserva->setFechaHasta($values['fecha_hasta']);
    $reserva->setTotal($total);
    $reserva->setmdCurrencyId(mdCurrencyHandler::getCurrent()->getId());
    $reserva->setCantidadPersonas($values['cantidad_personas']);
    $reserva->setStatus(mdReserva::PREPAYPAL);
    $reserva->save();
    $options = array(
        'objects' => array($reserva),
        'track' => 'reservas/done',
        'currency' => mdCurrencyHandler::getCurrent()->getCode()
    );
    $precio = round($reserva->getTotal() * 0.125, 0);
    //$precio = $reserva->getTotal();
    return mdGenericPaymentHandler::startPayment(mdGenericPaymentHandler::PAYPAL, $precio, $options);
  }

  public function executeDone($request) {
    $md_sale_id = $request->getParameter('sale');
    $mdGenericSale = Doctrine::getTable('mdGenericSale')->find($md_sale_id);
    if ($this->getUser()->getMdUserId() != $mdGenericSale->getmdUserId()) {
      $this->redirect('@homepage');
    }

    $items = $mdGenericSale->getMdGenericSaleItem();

    foreach ($items as $item) {
      $reserva = $item->getObject();
    }

    $this->depto = $reserva->getmdApartamento();

    $this->noches = count(mdBasicFunction::makeDayArray($reserva->getFechaDesde(), $reserva->getFechaHasta())) - 1;
    $this->reserva = $reserva;
    
    $this->setTemplate('salePaypalOK');
  }

  public function executeSalePaypalOK(sfWebRequest $request) {
    $token = $request->getParameter('token');
    $payerId = $request->getParameter('PayerID');
    $paymentaction = $request->getParameter('PAYMENTACTION');
    $mdSaleId = $request->getParameter('SALE');
    $track = $request->getParameter('track', 'reservas/done');
    $options = array();
    $options['token'] = $token;
    $options['paymentaction'] = $paymentaction;
    $mdGenericSale = Doctrine::getTable('mdGenericSale')->find($mdSaleId);

    if (mdGenericPaymentHandler::finishPayment(mdGenericPaymentHandler::PAYPAL, $mdGenericSale, $options)) 
    {
      // Obtenemos todos los items y los activamos
      $items = $mdGenericSale->getMdGenericSaleItem();
      foreach ($items as $item) {
        $reserva = Doctrine::getTable($item->getObjectClass())->find($item->getObjectId());
        $reserva->setStatus(mdReserva::CONFIRM);
        $reserva->save();
        foreach (mdBasicFunction::makeDayArray($reserva->getFechaDesde(), $reserva->getFechaHasta()) as $fecha) {
          if ($date = date_create_from_format('Y-m-d', $fecha)) {
            $nueva = new mdOcupacion();
            $nueva->setMdApartamentoId($reserva->getmdApartamentoId());
            $nueva->setDateTimeObject('fecha', $date);
            $nueva->save();
          }
        }
      }
      mdGenericSaleMailingHandler::sendConfirmAdminMail($mdGenericSale);
      mdGenericSaleMailingHandler::sendSaleFinishMail($mdGenericSale);

      if ($reserva->getmdApartamento()->getTipo() == 'comission')
        rentMailHandler::sendComissionMail($mdGenericSale);

      $track = $track . '?sale=' . $mdSaleId;
      //echo $track;
      //die();
      $this->redirect($track);
    }
    else 
    {
      $this->redirect('reservas/salePaypalError');
    }
  }

  public function executeSalePaypalCancel(sfWebRequest $request) 
  {
    $mdSaleId = $request->getParameter("SALE");
    $mdGenericSale = Doctrine::getTable('mdGenericSale')->find($mdSaleId);
    $reserva = null;
    foreach ($mdGenericSale->getMdGenericSaleItem() as $item) {
      $reserva = $item->getObject();
    }
    if(!is_null($reserva))
    {
      $reserva->setStatus(mdReserva::CANCELPAYPAL);
      $reserva->save();
    }
    $this->redirect('@homepage');
  }

  public function executeSalePaypalError(sfWebRequest $request) {
    //echo 'error';
    //die();
    //$this->redirect('@homepage');
  }

  public function executeProcess($request) {
    $form = new mdReservaFrontendForm();
    $parameter = $request->getParameter($form->getName());
    $form->bind($parameter);
    if ($form->isValid()) {
      $values = $form->getValues();
      $this->getUser()->setAttribute('reserva_values', $values);
      return $this->renderText(mdBasicFunction::basic_json_response(true, array()));
    } else {
      $partial = $this->getPartial('bookit', array('form' => $form));
      return $this->renderText(mdBasicFunction::basic_json_response(false, array('body' => $partial)));
    }
  }

  public function executeCalculatePrice($request) {
    $deptoId = $request->getParameter('md_apartamento_id', false);
    $desde = $request->getParameter('desde', false);
    $hasta = $request->getParameter('hasta', false);
    $precio = mdCurrencyHandler::getCurrentSymbol()." 0";
    $total = 0;
    if ((!$deptoId) or (!$desde) or (!$hasta)) {
      return $this->renderText(mdBasicFunction::basic_json_response(false, array('ocupado' => false, 'precio' => $precio)));
    } else {
        
      $diasOcupado = (int) Doctrine::getTable('mdOcupacion')->getDiasOcupados($deptoId, $desde, $hasta);
      if($diasOcupado > 0)
      {
        return $this->renderText(mdBasicFunction::basic_json_response(false, array('ocupado' => true, 'precio' => $precio)));
      }
      
      $search = Doctrine::getTable('mdApartamentoSearch')->find($deptoId);
      $day_list = mdBasicFunction::makeDayArray($desde, $hasta);
      if(count($day_list) < $search->getMinimoDias())
      {
        return $this->renderText(mdBasicFunction::basic_json_response(false, array('ocupado' => true, 'precio' => $precio)));
      }
      $depto = Doctrine::getTable('mdApartamento')->find($deptoId);
      $total = $depto->getPrecio($desde, $hasta);
      $precio = mdCurrencyHandler::getCurrentSymbol()." ".$depto->getPrecioPerDia($desde, $hasta);
      return $this->renderText(mdBasicFunction::basic_json_response(true, array('total' => $total, 'precio' => $precio)));
    }
  }
  
  public function executeDummyCancel(sfWebRequest $request)
  {
    $this->setTemplate('salePaypalCancel');
  }

  public function executeDummyOk(sfWebRequest $request)
  {
    $this->setTemplate('salePaypalOK');
  }
}
