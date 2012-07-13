<?php

/**
 * saleAdmin actions.
 *
 * @package    mdGenericSale
 * @subpackage saleAdmin
 * @author     Gaston Caldeiro
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class saleAdminActions extends sfActions {
  
  public function preExecute()
  {
    if(!$this->getUser()->hasPermission('Admin')  && $this->getUser()->isAuthenticated())
    {
      $this->redirect ( '@homepage' );
    }
  }  
  
  public function executeIndex(sfWebRequest $request)
  {
    $this->pager = new sfDoctrinePager ( 'mdGenericSale', 20 );

    $this->pager->setQuery ( Doctrine_Query::create()->select('gs.*')->from('mdGenericSale gs') );

    $this->pager->setPage ( $request->getParameter ( 'page', 1 ) );

    $this->pager->init ();
  }
  
  public function executeOpenBox(sfWebRequest $request){
    $mdsale = Doctrine::getTable('mdGenericSale')->find($request->getParameter('id'));

    return $this->renderText(json_encode(array(
      'content' => $this->getPartial('open_box', array('object' => $mdsale))
    )));
  }
  
  public function executeClosedBox(sfWebRequest $request){
    $mdsale = Doctrine::getTable('mdGenericSale')->find(array($request->getParameter('id')));

    return $this->renderText(json_encode(array(
        'content' => $this->getPartial('closed_box', array('object'=> $mdsale))
    )));
  }
  
    public function executeChangePaymentStatus(sfWebRequest $request)
    {
      $paymentId = $request->getParameter('saleId');
      $status = $request->getParameter('status');
      if($status != mdGenericPaymentHandler::STATUS_PENDING && ($status == mdGenericPaymentHandler::STATUS_ACCEPTED || $status == mdGenericPaymentHandler::STATUS_REJECTED))
      {
        mdGenericPaymentHandler::processResponse($paymentId, $status);
      }
      
      return $this->renderText(mdBasicFunction::basic_json_response(true, array()));
    }
}
