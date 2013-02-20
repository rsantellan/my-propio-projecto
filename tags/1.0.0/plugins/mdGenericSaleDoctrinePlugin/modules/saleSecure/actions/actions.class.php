<?php

/**
 * saleSecure actions.
 *
 * @package    mdGenericSale
 * @subpackage saleSecure
 * @author     Gaston Caldeiro
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class saleSecureActions extends sfActions {
  
    public function executeFinishWestern(sfWebRequest $request)
    {
      $id = $request->getParameter('id');
      
      $mdGenericSale = Doctrine::getTable("mdGenericSale")->find($id);

      // Si no ha sido procesada esta venta aun
      if( $mdGenericSale->getStatus() == '0' )
      {
        $mdPayment = $mdGenericSale->getMdGenericPayment();

        $object = $mdPayment->retrieveObject();

        $this->form = new mdGenericPaymentWesternForm($object);
        $this->id = $id;

        if($request->isMethod('post'))
        {
          $this->form->bind($request->getParameter($this->form->getName()));

          if ($this->form->isValid())
          {
            $this->form->save();

            mdGenericPaymentHandler::finishPayment(mdGenericPaymentHandler::WESTERN, $mdGenericSale);

            $this->getUser()->setFlash('mdWesternPaymentMade',true);
          }
        }
      }
      else
      {
        if( $mdGenericSale->getStatus() == '1' )
          $this->getUser()->setFlash('mdWesternPaymentMade',true);          
        else
          $this->getUser()->setFlash('mdWesternPaymentProcessed',true);
      }
    }
    
    public function executeFinishGiro(sfWebRequest $request)
    {
      $id = $request->getParameter('id');
      
      $mdGenericSale = Doctrine::getTable("mdGenericSale")->find($id);
      
      // Si no ha sido procesada esta venta aun
      if( $mdGenericSale->getStatus() == '0' )
      {
        $mdPayment = $mdGenericSale->getMdGenericPayment();

        $object = $mdPayment->retrieveObject();

        $this->form = new mdGenericPaymentGiroBancarioForm($object);
        $this->id = $id;

        if($request->isMethod('post'))
        {
          $this->form->bind($request->getParameter($this->form->getName()));

          if ($this->form->isValid())
          {
            $this->form->save();

            mdGenericPaymentHandler::finishPayment(mdGenericPaymentHandler::GIRO_BANCARIO, $mdGenericSale);

            $this->getUser()->setFlash('mdGiroPaymentMade',true);
          }
        }
      }
      else
      {
        if( $mdGenericSale->getStatus() == '1' )
          $this->getUser()->setFlash('mdGiroPaymentMade',true);          
        else
          $this->getUser()->setFlash('mdGiroPaymentProcessed',true);
      }
    }     
    
    public function executeFinishAbitab(sfWebRequest $request)
    {
      $id = $request->getParameter('id');
      
      $mdGenericSale = Doctrine::getTable("mdGenericSale")->find($id);
      
      // Si no ha sido procesada esta venta aun
      if( $mdGenericSale->getStatus() == '0' )
      {
        $mdPayment = $mdGenericSale->getMdGenericPayment();

        $object = $mdPayment->retrieveObject();

        $this->form = new mdGenericPaymentAbitabForm($object);
        $this->id = $id;

        if($request->isMethod('post'))
        {
          $this->form->bind($request->getParameter($this->form->getName()));

          if ($this->form->isValid())
          {
            $this->form->save();

            mdGenericPaymentHandler::finishPayment(mdGenericPaymentHandler::ABITAB, $mdGenericSale);

            $this->getUser()->setFlash('mdAbitabPaymentMade',true);
          }
        }
      }
      else
      {
        if( $mdGenericSale->getStatus() == '1' )
          $this->getUser()->setFlash('mdAbitabPaymentMade',true);          
        else
          $this->getUser()->setFlash('mdAbitabPaymentProcessed',true);
      }
    }
   
}
