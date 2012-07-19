<?php

/**
 * mdLocacionTemporada filter form base class.
 *
 * @package    rentNchill
 * @subpackage filter
 * @author     maui
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasemdLocacionTemporadaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'md_locacion_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('mdLocacion'), 'add_empty' => true)),
      'date_from'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'date_to'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'tipo'           => new sfWidgetFormChoice(array('choices' => array('' => '', 'A' => 'A', 'M' => 'M'))),
    ));

    $this->setValidators(array(
      'md_locacion_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('mdLocacion'), 'column' => 'id')),
      'date_from'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'date_to'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'tipo'           => new sfValidatorChoice(array('required' => false, 'choices' => array('A' => 'A', 'M' => 'M'))),
    ));

    $this->widgetSchema->setNameFormat('md_locacion_temporada_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mdLocacionTemporada';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'md_locacion_id' => 'ForeignKey',
      'date_from'      => 'Date',
      'date_to'        => 'Date',
      'tipo'           => 'Enum',
    );
  }
}
