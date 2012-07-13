<?php

/**
 * BasemdGenericPaymentAbitab
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $note
 * 
 * @method integer                getId()   Returns the current record's "id" value
 * @method string                 getNote() Returns the current record's "note" value
 * @method mdGenericPaymentAbitab setId()   Sets the current record's "id" value
 * @method mdGenericPaymentAbitab setNote() Sets the current record's "note" value
 * 
 * @package    rentNchill
 * @subpackage model
 * @author     maui
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasemdGenericPaymentAbitab extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('md_generic_payment_abitab');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('note', 'string', 128, array(
             'type' => 'string',
             'length' => 128,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}