<?php

/**
 * mdDetalle form base class.
 *
 * @method mdDetalle getObject() Returns the current form's model object
 *
 * @package    rentNchill
 * @subpackage form
 * @author     maui
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasemdDetalleForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'md_apartamento_id' => new sfWidgetFormInputHidden(),
      'tipo_propiedad'    => new sfWidgetFormChoice(array('choices' => array('apartment' => 'apartment', 'house' => 'house', 'bedNbreakfast' => 'bedNbreakfast', 'cabin' => 'cabin', 'villa' => 'villa', 'castle' => 'castle', 'dorm' => 'dorm', 'treehouse' => 'treehouse', 'boat' => 'boat', 'automobile' => 'automobile', 'igloo' => 'igloo'))),
      'cuartos'           => new sfWidgetFormInputText(),
      'banios'            => new sfWidgetFormInputText(),
      'costo_extra'       => new sfWidgetFormInputText(),
      'minimo_dias'       => new sfWidgetFormInputText(),
      'barrio'            => new sfWidgetFormInputText(),
      'metraje'           => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'md_apartamento_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('md_apartamento_id')), 'empty_value' => $this->getObject()->get('md_apartamento_id'), 'required' => false)),
      'tipo_propiedad'    => new sfValidatorChoice(array('choices' => array(0 => 'apartment', 1 => 'house', 2 => 'bedNbreakfast', 3 => 'cabin', 4 => 'villa', 5 => 'castle', 6 => 'dorm', 7 => 'treehouse', 8 => 'boat', 9 => 'automobile', 10 => 'igloo'), 'required' => false)),
      'cuartos'           => new sfValidatorInteger(array('required' => false)),
      'banios'            => new sfValidatorInteger(array('required' => false)),
      'costo_extra'       => new sfValidatorNumber(array('required' => false)),
      'minimo_dias'       => new sfValidatorInteger(array('required' => false)),
      'barrio'            => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'metraje'           => new sfValidatorString(array('max_length' => 100, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('md_detalle[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mdDetalle';
  }

}
