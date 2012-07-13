<?php

class rentMailHandler {

  /**
   * Envia un mail al usuario con la confirmacion de la compra realizada
   * 
   * @param string $method
   * @param mdPassport $mdPassport
   * @param mdGenericSale $mdGenericSale
   * @param void
   */
  public static function sendComissionMail($mdGenericSale)
  {
    sfContext::getInstance()->getConfiguration()->loadHelpers(array('I18N', 'Partial'));
    
    $mdSaleXMLHandler = new mdSaleXMLHandler();
    $from = (string) $mdSaleXMLHandler->getInformSaleEmail();
    $fromArray = explode(",", $from);
    
    $mailBody = get_partial('saleMailing/mail_comission', array('mdGenericSale' => $mdGenericSale));
		$subject = get_partial('saleMailing/mail_comission_subject', array('mdGenericSale' => $mdGenericSale));
    
    $options['sender'] = array('name' => __('Mail_Nombre del mail al usuario con confirmacion de pago'), 'email' => $fromArray[0]);
    $options['subject'] = $subject;
    $options['body'] = $mailBody;
    $options['recipients'] = $mdGenericSale->getMdUser()->getEmail();
    
    mdMailHandler::sendMail($options);    
  }
}
