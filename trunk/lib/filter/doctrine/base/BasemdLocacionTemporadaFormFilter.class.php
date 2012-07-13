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
      'dia_desde'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mes_desde'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'dia_hasta'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mes_hasta'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'md_locacion_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('mdLocacion'), 'column' => 'id')),
      'dia_desde'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'mes_desde'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'dia_hasta'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'mes_hasta'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
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
      'dia_desde'      => 'Number',
      'mes_desde'      => 'Number',
      'dia_hasta'      => 'Number',
      'mes_hasta'      => 'Number',
    );
  }
}
