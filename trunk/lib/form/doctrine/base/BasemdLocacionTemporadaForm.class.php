<?php

/**
 * mdLocacionTemporada form base class.
 *
 * @method mdLocacionTemporada getObject() Returns the current form's model object
 *
 * @package    rentNchill
 * @subpackage form
 * @author     maui
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasemdLocacionTemporadaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'md_locacion_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('mdLocacion'), 'add_empty' => false)),
      'dia_desde'      => new sfWidgetFormInputText(),
      'mes_desde'      => new sfWidgetFormInputText(),
      'dia_hasta'      => new sfWidgetFormInputText(),
      'mes_hasta'      => new sfWidgetFormInputText(),
      'tipo'           => new sfWidgetFormChoice(array('choices' => array('A' => 'A', 'M' => 'M'))),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'md_locacion_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('mdLocacion'))),
      'dia_desde'      => new sfValidatorInteger(),
      'mes_desde'      => new sfValidatorInteger(),
      'dia_hasta'      => new sfValidatorInteger(),
      'mes_hasta'      => new sfValidatorInteger(),
      'tipo'           => new sfValidatorChoice(array('choices' => array(0 => 'A', 1 => 'M'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('md_locacion_temporada[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mdLocacionTemporada';
  }

}
