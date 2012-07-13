<?php

/**
 * PluginmdGenericPayment
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class PluginmdGenericPayment extends BasemdGenericPayment
{
  public function retrieveObject()
  {
    return Doctrine::getTable($this->getObjectClass())->find($this->getObjectId());
  }
  
  public function getMethodPay()
  {
    $class = $this->getObjectClass();
    switch($class)
    {
      case 'mdGenericPaymentAbitab':
        return 'Abitab';
        break;
      case 'mdGenericPaymentGiroBancario':
        return 'Giro Bancario';
        break;
      case 'mdGenericPaymentOther':
        return 'Otro';
        break;
      case 'mdGenericPaymentPaypal':
        return 'Paypal';
        break;
      case 'mdGenericPaymentWestern':
        return 'Western Union';
        break;
      default :
        throw new Exception('PluginmdGenericPayment::getMethodPay - not implemented for class ' . $class);
        break;
    }
  }
}