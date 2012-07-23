<?php

/**
 * mdLocacion form base class.
 *
 * @method mdLocacion getObject() Returns the current form's model object
 *
 * @package    rentNchill
 * @subpackage form
 * @author     maui
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasemdLocacionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'country' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'country' => new sfValidatorString(array('max_length' => 2)),
    ));

    $this->widgetSchema->setNameFormat('md_locacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mdLocacion';
  }

}
