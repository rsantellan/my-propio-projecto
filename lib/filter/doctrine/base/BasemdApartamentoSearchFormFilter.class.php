<?php

/**
 * mdApartamentoSearch filter form base class.
 *
 * @package    rentNchill
 * @subpackage filter
 * @author     maui
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasemdApartamentoSearchFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'md_locacion_id'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'precio_alta'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'precio_baja'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cantidad_personas' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tipo_propiedad'    => new sfWidgetFormChoice(array('choices' => array('' => '', 'apartment' => 'apartment', 'house' => 'house', 'bedNbreakfast' => 'bedNbreakfast', 'cabin' => 'cabin', 'villa' => 'villa', 'castle' => 'castle', 'dorm' => 'dorm', 'treehouse' => 'treehouse', 'boat' => 'boat', 'automobile' => 'automobile', 'igloo' => 'igloo'))),
      'metraje'           => new sfWidgetFormFilterInput(),
      'cuartos'           => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'md_locacion_id'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'precio_alta'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'precio_baja'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'cantidad_personas' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'tipo_propiedad'    => new sfValidatorChoice(array('required' => false, 'choices' => array('apartment' => 'apartment', 'house' => 'house', 'bedNbreakfast' => 'bedNbreakfast', 'cabin' => 'cabin', 'villa' => 'villa', 'castle' => 'castle', 'dorm' => 'dorm', 'treehouse' => 'treehouse', 'boat' => 'boat', 'automobile' => 'automobile', 'igloo' => 'igloo'))),
      'metraje'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cuartos'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('md_apartamento_search_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mdApartamentoSearch';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'md_locacion_id'    => 'Number',
      'precio_alta'       => 'Number',
      'precio_baja'       => 'Number',
      'cantidad_personas' => 'Number',
      'tipo_propiedad'    => 'Enum',
      'metraje'           => 'Number',
      'cuartos'           => 'Number',
    );
  }
}
