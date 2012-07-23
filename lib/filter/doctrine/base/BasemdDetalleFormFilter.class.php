<?php

/**
 * mdDetalle filter form base class.
 *
 * @package    rentNchill
 * @subpackage filter
 * @author     maui
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasemdDetalleFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'tipo_propiedad'    => new sfWidgetFormChoice(array('choices' => array('' => '', 'apartment' => 'apartment', 'house' => 'house', 'bedNbreakfast' => 'bedNbreakfast', 'cabin' => 'cabin', 'villa' => 'villa', 'castle' => 'castle', 'dorm' => 'dorm', 'treehouse' => 'treehouse', 'boat' => 'boat', 'automobile' => 'automobile', 'igloo' => 'igloo'))),
      'cuartos'           => new sfWidgetFormFilterInput(),
      'banios'            => new sfWidgetFormFilterInput(),
      'costo_extra'       => new sfWidgetFormFilterInput(),
      'minimo_dias'       => new sfWidgetFormFilterInput(),
      'barrio'            => new sfWidgetFormFilterInput(),
      'metraje'           => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'tipo_propiedad'    => new sfValidatorChoice(array('required' => false, 'choices' => array('apartment' => 'apartment', 'house' => 'house', 'bedNbreakfast' => 'bedNbreakfast', 'cabin' => 'cabin', 'villa' => 'villa', 'castle' => 'castle', 'dorm' => 'dorm', 'treehouse' => 'treehouse', 'boat' => 'boat', 'automobile' => 'automobile', 'igloo' => 'igloo'))),
      'cuartos'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'banios'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'costo_extra'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'minimo_dias'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'barrio'            => new sfValidatorPass(array('required' => false)),
      'metraje'           => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('md_detalle_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mdDetalle';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'md_apartamento_id' => 'Number',
      'tipo_propiedad'    => 'Enum',
      'cuartos'           => 'Number',
      'banios'            => 'Number',
      'costo_extra'       => 'Number',
      'minimo_dias'       => 'Number',
      'barrio'            => 'Text',
      'metraje'           => 'Text',
    );
  }
}
