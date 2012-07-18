<?php

/**
 * mdApartamento_mdComodidad form base class.
 *
 * @method mdApartamento_mdComodidad getObject() Returns the current form's model object
 *
 * @package    rentNchill
 * @subpackage form
 * @author     maui
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasemdApartamento_mdComodidadForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'md_apartamento_id' => new sfWidgetFormInputHidden(),
      'md_comodidad_id'   => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'md_apartamento_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('md_apartamento_id')), 'empty_value' => $this->getObject()->get('md_apartamento_id'), 'required' => false)),
      'md_comodidad_id'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('md_comodidad_id')), 'empty_value' => $this->getObject()->get('md_comodidad_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('md_apartamento_md_comodidad[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mdApartamento_mdComodidad';
  }

}
