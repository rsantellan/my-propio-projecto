<?php

/**
 * mdGenericSale form base class.
 *
 * @method mdGenericSale getObject() Returns the current form's model object
 *
 * @package    rentNchill
 * @subpackage form
 * @author     maui
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasemdGenericSaleForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'md_user_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('mdUser'), 'add_empty' => false)),
      'price'         => new sfWidgetFormInputText(),
      'status'        => new sfWidgetFormInputText(),
      'md_payment_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('mdGenericPayment'), 'add_empty' => false)),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'md_user_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('mdUser'))),
      'price'         => new sfValidatorNumber(),
      'status'        => new sfValidatorInteger(array('required' => false)),
      'md_payment_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('mdGenericPayment'))),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('md_generic_sale[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mdGenericSale';
  }

}
