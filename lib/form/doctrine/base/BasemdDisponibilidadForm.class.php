<?php

/**
 * mdDisponibilidad form base class.
 *
 * @method mdDisponibilidad getObject() Returns the current form's model object
 *
 * @package    rentNchill
 * @subpackage form
 * @author     Rodrigo Santellan
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasemdDisponibilidadForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'md_apartamento_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('mdApartamento'), 'add_empty' => false)),
      'fecha_desde'       => new sfWidgetFormDateTime(),
      'fecha_hasta'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'md_apartamento_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('mdApartamento'))),
      'fecha_desde'       => new sfValidatorDateTime(),
      'fecha_hasta'       => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('md_disponibilidad[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mdDisponibilidad';
  }

}
