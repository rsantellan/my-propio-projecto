<?php

/**
 * mdOcupacion form base class.
 *
 * @method mdOcupacion getObject() Returns the current form's model object
 *
 * @package    rentNchill
 * @subpackage form
 * @author     maui
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasemdOcupacionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'md_apartamento_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('mdApartamento'), 'add_empty' => false)),
      'fecha'             => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'md_apartamento_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('mdApartamento'))),
      'fecha'             => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('md_ocupacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mdOcupacion';
  }

}
