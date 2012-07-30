<?php

/**
 * mdGoogleMap form base class.
 *
 * @method mdGoogleMap getObject() Returns the current form's model object
 *
 * @package    rentNchill
 * @subpackage form
 * @author     Rodrigo Santellan
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasemdGoogleMapForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'object_class_name' => new sfWidgetFormInputText(),
      'object_id'         => new sfWidgetFormInputText(),
      'latitude'          => new sfWidgetFormInputText(),
      'longitude'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'object_class_name' => new sfValidatorString(array('max_length' => 128)),
      'object_id'         => new sfValidatorPass(),
      'latitude'          => new sfValidatorNumber(array('required' => false)),
      'longitude'         => new sfValidatorNumber(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'mdGoogleMap', 'column' => array('object_class_name', 'object_id')))
    );

    $this->widgetSchema->setNameFormat('md_google_map[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mdGoogleMap';
  }

}
