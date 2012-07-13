<?php

class saleAdminComponents extends sfComponents 
{
  public function executePaymentOption() 
  {
    $this->payment = $this->mdSale->getMdGenericPayment();
    $this->used = $this->payment->retrieveObject();
  }
}
