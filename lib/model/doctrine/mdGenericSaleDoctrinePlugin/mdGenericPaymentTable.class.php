<?php

/**
 * mdGenericPaymentTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class mdGenericPaymentTable extends PluginmdGenericPaymentTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object mdGenericPaymentTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('mdGenericPayment');
    }
}