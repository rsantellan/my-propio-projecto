<?php

/**
 * temporadaAnual filter form base class.
 *
 * @package    rentNchill
 * @subpackage filter
 * @author     Rodrigo Santellan
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasetemporadaAnualFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'tipo'           => new sfWidgetFormChoice(array('choices' => array('' => '', 'Invierno' => 'Invierno', 'Primavera / Otoño' => 'Primavera / Otoño', 'Reveillon' => 'Reveillon', 'Enero' => 'Enero', 'Febrero' => 'Febrero'))),
    ));

    $this->setValidators(array(
      'tipo'           => new sfValidatorChoice(array('required' => false, 'choices' => array('Invierno' => 'Invierno', 'Primavera / Otoño' => 'Primavera / Otoño', 'Reveillon' => 'Reveillon', 'Enero' => 'Enero', 'Febrero' => 'Febrero'))),
    ));

    $this->widgetSchema->setNameFormat('temporada_anual_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'temporadaAnual';
  }

  public function getFields()
  {
    return array(
      'fecha'          => 'Date',
      'md_locacion_id' => 'Number',
      'tipo'           => 'Enum',
    );
  }
}
