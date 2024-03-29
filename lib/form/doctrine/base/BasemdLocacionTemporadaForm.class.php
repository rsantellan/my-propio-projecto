<?php

/**
 * mdLocacionTemporada form base class.
 *
 * @method mdLocacionTemporada getObject() Returns the current form's model object
 *
 * @package    rentNchill
 * @subpackage form
 * @author     Rodrigo Santellan
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasemdLocacionTemporadaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'md_locacion_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('mdLocacion'), 'add_empty' => false)),
      'date_from'      => new sfWidgetFormDate(),
      'date_to'        => new sfWidgetFormDate(),
      'tipo'           => new sfWidgetFormChoice(array('choices' => array('Invierno' => 'Invierno', 'Primavera / Otoño' => 'Primavera / Otoño', 'Reveillon' => 'Reveillon', 'Enero' => 'Enero', 'Febrero' => 'Febrero'))),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'md_locacion_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('mdLocacion'))),
      'date_from'      => new sfValidatorDate(),
      'date_to'        => new sfValidatorDate(),
      'tipo'           => new sfValidatorChoice(array('choices' => array(0 => 'Invierno', 1 => 'Primavera / Otoño', 2 => 'Reveillon', 3 => 'Enero', 4 => 'Febrero'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('md_locacion_temporada[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mdLocacionTemporada';
  }

}
