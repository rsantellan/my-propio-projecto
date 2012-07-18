<?php

/**
 * mdReserva form base class.
 *
 * @method mdReserva getObject() Returns the current form's model object
 *
 * @package    rentNchill
 * @subpackage form
 * @author     maui
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasemdReservaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'md_user_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('mdUser'), 'add_empty' => false)),
      'md_apartamento_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('mdApartamento'), 'add_empty' => false)),
      'fecha_desde'       => new sfWidgetFormDate(),
      'fecha_hasta'       => new sfWidgetFormDate(),
      'cantidad_personas' => new sfWidgetFormInputText(),
      'md_currency_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('mdCurrency'), 'add_empty' => false)),
      'total'             => new sfWidgetFormInputText(),
      'status'            => new sfWidgetFormChoice(array('choices' => array('pending' => 'pending', 'confirm' => 'confirm', 'efective' => 'efective', 'cancel' => 'cancel'))),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'md_user_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('mdUser'))),
      'md_apartamento_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('mdApartamento'))),
      'fecha_desde'       => new sfValidatorDate(),
      'fecha_hasta'       => new sfValidatorDate(),
      'cantidad_personas' => new sfValidatorInteger(),
      'md_currency_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('mdCurrency'))),
      'total'             => new sfValidatorPass(),
      'status'            => new sfValidatorChoice(array('choices' => array(0 => 'pending', 1 => 'confirm', 2 => 'efective', 3 => 'cancel'), 'required' => false)),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('md_reserva[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mdReserva';
  }

}
