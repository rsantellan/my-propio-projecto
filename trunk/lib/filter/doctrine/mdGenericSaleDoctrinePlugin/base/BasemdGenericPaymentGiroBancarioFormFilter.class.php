<?php

/**
 * mdGenericPaymentGiroBancario filter form base class.
 *
 * @package    rentNchill
 * @subpackage filter
 * @author     maui
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasemdGenericPaymentGiroBancarioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'note' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'note' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('md_generic_payment_giro_bancario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mdGenericPaymentGiroBancario';
  }

  public function getFields()
  {
    return array(
      'id'   => 'Number',
      'note' => 'Text',
    );
  }
}
