<?php

/**
 * temporadaAnual form base class.
 *
 * @method temporadaAnual getObject() Returns the current form's model object
 *
 * @package    rentNchill
 * @subpackage form
 * @author     Rodrigo Santellan
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasetemporadaAnualForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'fecha'          => new sfWidgetFormInputHidden(),
      'md_locacion_id' => new sfWidgetFormInputHidden(),
      'tipo'           => new sfWidgetFormChoice(array('choices' => array('Invierno' => 'Invierno', 'Primavera / Otoño' => 'Primavera / Otoño', 'Reveillon' => 'Reveillon', 'Enero' => 'Enero', 'Febrero' => 'Febrero'))),
    ));

    $this->setValidators(array(
      'fecha'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('fecha')), 'empty_value' => $this->getObject()->get('fecha'), 'required' => false)),
      'md_locacion_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('md_locacion_id')), 'empty_value' => $this->getObject()->get('md_locacion_id'), 'required' => false)),
      'tipo'           => new sfValidatorChoice(array('choices' => array(0 => 'Invierno', 1 => 'Primavera / Otoño', 2 => 'Reveillon', 3 => 'Enero', 4 => 'Febrero'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('temporada_anual[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'temporadaAnual';
  }

}
