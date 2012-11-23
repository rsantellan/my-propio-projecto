<?php

/**
 * mdApartamentoSearch form base class.
 *
 * @method mdApartamentoSearch getObject() Returns the current form's model object
 *
 * @package    rentNchill
 * @subpackage form
 * @author     Rodrigo Santellan
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasemdApartamentoSearchForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'md_locacion_id'    => new sfWidgetFormInputText(),
      'precio_alta'       => new sfWidgetFormInputText(),
      'precio_media'      => new sfWidgetFormInputText(),
      'precio_baja'       => new sfWidgetFormInputText(),
      'precio_febrero'    => new sfWidgetFormInputText(),
      'precio_revellion'  => new sfWidgetFormInputText(),
      'cantidad_personas' => new sfWidgetFormInputText(),
      'tipo_propiedad'    => new sfWidgetFormChoice(array('choices' => array('apartment' => 'apartment', 'house' => 'house', 'bedNbreakfast' => 'bedNbreakfast', 'cabin' => 'cabin', 'villa' => 'villa', 'castle' => 'castle', 'dorm' => 'dorm', 'treehouse' => 'treehouse', 'boat' => 'boat', 'automobile' => 'automobile', 'igloo' => 'igloo'))),
      'metraje'           => new sfWidgetFormInputText(),
      'cuartos'           => new sfWidgetFormInputText(),
      'minimo_dias'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'md_locacion_id'    => new sfValidatorInteger(),
      'precio_alta'       => new sfValidatorNumber(),
      'precio_media'      => new sfValidatorNumber(),
      'precio_baja'       => new sfValidatorNumber(),
      'precio_febrero'    => new sfValidatorNumber(array('required' => false)),
      'precio_revellion'  => new sfValidatorNumber(array('required' => false)),
      'cantidad_personas' => new sfValidatorInteger(),
      'tipo_propiedad'    => new sfValidatorChoice(array('choices' => array(0 => 'apartment', 1 => 'house', 2 => 'bedNbreakfast', 3 => 'cabin', 4 => 'villa', 5 => 'castle', 6 => 'dorm', 7 => 'treehouse', 8 => 'boat', 9 => 'automobile', 10 => 'igloo'), 'required' => false)),
      'metraje'           => new sfValidatorInteger(array('required' => false)),
      'cuartos'           => new sfValidatorInteger(array('required' => false)),
      'minimo_dias'       => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('md_apartamento_search[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mdApartamentoSearch';
  }

}
