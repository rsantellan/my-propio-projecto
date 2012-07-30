<?php

/**
 * mdGoogleMap filter form base class.
 *
 * @package    rentNchill
 * @subpackage filter
 * @author     Rodrigo Santellan
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasemdGoogleMapFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'object_class_name' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'object_id'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'latitude'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'longitude'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'object_class_name' => new sfValidatorPass(array('required' => false)),
      'object_id'         => new sfValidatorPass(array('required' => false)),
      'latitude'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'longitude'         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('md_google_map_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mdGoogleMap';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'object_class_name' => 'Text',
      'object_id'         => 'Text',
      'latitude'          => 'Number',
      'longitude'         => 'Number',
    );
  }
}
