<?php

/**
 * mdGenericPaymentPaypal filter form base class.
 *
 * @package    rentNchill
 * @subpackage filter
 * @author     maui
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasemdGenericPaymentPaypalFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'token'   => new sfWidgetFormFilterInput(),
      'payerId' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'token'   => new sfValidatorPass(array('required' => false)),
      'payerId' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('md_generic_payment_paypal_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mdGenericPaymentPaypal';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'token'   => 'Text',
      'payerId' => 'Text',
    );
  }
}
