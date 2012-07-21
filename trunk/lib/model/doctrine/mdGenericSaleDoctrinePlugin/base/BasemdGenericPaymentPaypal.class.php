<?php

/**
 * BasemdGenericPaymentPaypal
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $token
 * @property string $payerId
 * 
 * @method integer                getId()      Returns the current record's "id" value
 * @method string                 getToken()   Returns the current record's "token" value
 * @method string                 getPayerId() Returns the current record's "payerId" value
 * @method mdGenericPaymentPaypal setId()      Sets the current record's "id" value
 * @method mdGenericPaymentPaypal setToken()   Sets the current record's "token" value
 * @method mdGenericPaymentPaypal setPayerId() Sets the current record's "payerId" value
 * 
 * @package    rentNchill
 * @subpackage model
 * @author     maui
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasemdGenericPaymentPaypal extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('md_generic_payment_paypal');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('token', 'string', 128, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 128,
             ));
        $this->hasColumn('payerId', 'string', 128, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 128,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}