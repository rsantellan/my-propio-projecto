<?php

class mdGenericSaleMailingHandler {

  /**
   * Envia el mail una ves que el usuario ingreso el codigo desde el frontend
   * para notificar al admin que tiene que confirmar la transaccion
   * 
   * @param mdGenericSale $mdGenericSale
   * @param void 
   */
  public static function sendConfirmAdminMail($mdGenericSale) 
  {
    sfContext::getInstance()->getConfiguration()->loadHelpers(array('I18N','Url', 'Partial'));

		$mailBody = get_partial('saleMailing/mail_admin_new', array('mdGenericSale' => $mdGenericSale));
		$subject = get_partial('saleMailing/mail_admin_new_subject', array('mdGenericSale' => $mdGenericSale));
    
    $mdSaleXMLHandler = new mdSaleXMLHandler();
    $from = (string) $mdSaleXMLHandler->getInformSaleEmail();
    $fromArray = explode(",", $from);
    $reciver = (string) $mdSaleXMLHandler->getInformSaleEmail();
    $recivierArray = explode(",", $reciver);

    $options = array();
    $options['recipients'] = $recivierArray;
    $options['sender'] = array('name' => __('Mail_Admin ventas'), 'email' => $fromArray[0]);
    $options['subject'] = $subject;
    $options['body'] = $mailBody;

    mdMailHandler::sendMail($options);
  }
  
  /**
   * Envia el mail una ves que el usuario solicita realizar un pago desde el frontend
   * para notificar al admin que hay una nueva posible venta
   * 
   * @param mdGenericSale $mdGenericSale
   * @param void
   */  
  public static function sendNewAdminMail($mdGenericSale)
  {
    sfContext::getInstance()->getConfiguration()->loadHelpers(array('I18N','Url', 'Partial'));

    $mailBody = get_partial('saleMailing/mail_admin_new', array('mdGenericSale' => $mdGenericSale));
		$subject = get_partial('saleMailing/mail_admin_new_subject', array('mdGenericSale' => $mdGenericSale));
		    
    $mdSaleXMLHandler = new mdSaleXMLHandler();
    $from = (string) $mdSaleXMLHandler->getInformSaleEmail();
    $fromArray = explode(",", $from);
    $reciver = (string) $mdSaleXMLHandler->getInformSaleEmail();
    $recivierArray = explode(",", $reciver);


		
    $options = array();
    $options['recipients'] = $recivierArray;
    $options['sender'] = array('name' => __('Mail_Admin ventas'), 'email' => $fromArray[0]);
    $options['subject'] = $subject;
    $options['body'] = $mailBody;

    mdMailHandler::sendMail($options);    
  }
  
  /**
   * Envia un mail al usuario con los datos del metodo de pago
   * 
   * @param string $method
   * @param mdPassport $mdPassport
   * @param mdGenericSale $mdGenericSale
   * @param void
   */
  public static function sendSaleMail($method, $mdPassport, $mdGenericSale)
  {
    sfContext::getInstance()->getConfiguration()->loadHelpers(array('I18N', 'Partial'));
    
    $mdSaleXMLHandler = new mdSaleXMLHandler();
    $from = (string) $mdSaleXMLHandler->getInformSaleEmail();
    $fromArray = explode(",", $from);

    $mailBody = get_partial('saleMailing/mail_' . $method, array('user' => $mdPassport->getMdUserProfile(), 'mdGenericSale' => $mdGenericSale));

    $options = array();
    $options['sender'] = array('name' => __('Mail_Nombre del mail al usuario con detalle del metodo de pago'), 'email' => $fromArray[0]);
    $options['body']      = $mailBody;
    $options['subject']   = __("mailVenta_subject_cliente " . $method);
    $options['recipients'] = $mdPassport->getMdUser()->getEmail();
    
    mdMailHandler::sendMail($options);
  }
  
  /**
   * Envia un mail al usuario con la confirmacion del administrador que dio desde
   * el backend
   * 
   * @param string $method
   * @param mdPassport $mdPassport
   * @param mdGenericSale $mdGenericSale
   * @param void
   */
  public static function sendSaleConfirmMail($mdGenericSale)
  {
    sfContext::getInstance()->getConfiguration()->loadHelpers(array('I18N', 'Partial'));
    
    $mdSaleXMLHandler = new mdSaleXMLHandler();
    $from = (string) $mdSaleXMLHandler->getInformSaleEmail();
    $fromArray = explode(",", $from);
    
    $mailBody = get_partial('saleMailing/mail_user_confirm', array('status' => $mdGenericSale->getStatus()));
    $subject = __("Mail_subject respuesta confirmacion_" . str_replace(array('2', '3'), array('aceptado', 'rechazado'), $mdGenericSale->getStatus()));
    
    $options['sender'] = array('name' => __('Mail_Nombre del mail al usuario con confirmacion de pago'), 'email' => $fromArray[0]);
    $options['subject'] = $subject;
    $options['body'] = $mailBody;
    $options['recipients'] = $mdGenericSale->getMdUser()->getEmail();
    
    mdMailHandler::sendMail($options);    
  }  

  /**
   * Envia un mail al usuario con la confirmacion de la compra realizada
   * 
   * @param string $method
   * @param mdPassport $mdPassport
   * @param mdGenericSale $mdGenericSale
   * @param void
   */
  public static function sendSaleFinishMail($mdGenericSale)
  {
    sfContext::getInstance()->getConfiguration()->loadHelpers(array('I18N', 'Partial'));
    
    $mdSaleXMLHandler = new mdSaleXMLHandler();
    $from = (string) $mdSaleXMLHandler->getInformSaleEmail();
    $fromArray = explode(",", $from);
    
    $mailBody = get_partial('saleMailing/mail_user_finish', array('mdGenericSale' => $mdGenericSale));
	$subject = get_partial('saleMailing/mail_user_finish_subject', array('mdGenericSale' => $mdGenericSale));
    
    $options['sender'] = array('name' => __('Mail_Nombre del mail al usuario con confirmacion de pago'), 'email' => $fromArray[0]);
    $options['subject'] = $subject;
    $options['body'] = $mailBody;
    $options['recipients'] = $mdGenericSale->getMdUser()->getEmail();
    
    mdMailHandler::sendMail($options);    
  }  


}

