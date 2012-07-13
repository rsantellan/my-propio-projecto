<?php

/**
 * sale actions.
 *
 * @package    mdGenericSale
 * @subpackage sale
 * @author     Gaston Caldeiro
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class saleActions extends sfActions {
  
  public function executeDoSaleByAjax(sfWebRequest $request) 
  {
    $options = array('is_ajax' => true);
    
    $result = $this->dispatchPay($request, $options);
    if($result)
    {
      return $this->renderText(mdBasicFunction::basic_json_response(true, array()));
    }
    else
    {
      return $this->renderText(mdBasicFunction::basic_json_response(false, array()));      
    }
  }
  
  public function executeDoSale(sfWebRequest $request) 
  {
    $this->dispatchPay($request, $options);
  }
  
  private function dispatchPay($request, $options)
  {
    switch ($request->getParameter('pago'))
    {
      case mdGenericPaymentHandler::ABITAB:
          $result = mdGenericPaymentHandler::startPayment(mdGenericPaymentHandler::ABITAB, $options);
        break;
      case mdGenericPaymentHandler::GIRO_BANCARIO:
          $result = mdGenericPaymentHandler::startPayment(mdGenericPaymentHandler::GIRO_BANCARIO, $options);
        break;
      case mdGenericPaymentHandler::WESTERN:
          $result = mdGenericPaymentHandler::startPayment(mdGenericPaymentHandler::WESTERN, $options);
        break;
      default:
        $result = false;
        break;
    }
    return $result;
  } 
}
