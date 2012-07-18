<?php

/**
 * mdGenericPaymentPaypal form base class.
 *
 * @method mdGenericPaymentPaypal getObject() Returns the current form's model object
 *
 * @package    rentNchill
 * @subpackage form
 * @author     maui
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasemdGenericPaymentPaypalForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'token'   => new sfWidgetFormInputText(),
      'payerId' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'token'   => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'payerId' => new sfValidatorString(array('max_length' => 128, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('md_generic_payment_paypal[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mdGenericPaymentPaypal';
  }

}
