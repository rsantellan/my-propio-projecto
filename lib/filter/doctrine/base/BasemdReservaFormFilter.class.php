<?php

/**
 * mdReserva filter form base class.
 *
 * @package    rentNchill
 * @subpackage filter
 * @author     maui
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasemdReservaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'md_user_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('mdUser'), 'add_empty' => true)),
      'md_apartamento_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('mdApartamento'), 'add_empty' => true)),
      'fecha_desde'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'fecha_hasta'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'cantidad_personas' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'md_currency_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('mdCurrency'), 'add_empty' => true)),
      'total'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'status'            => new sfWidgetFormChoice(array('choices' => array('' => '', 'pending' => 'pending', 'confirm' => 'confirm', 'efective' => 'efective', 'cancel' => 'cancel', 'cancelPayPal' => 'cancelPayPal', 'errorPayPal' => 'errorPayPal'))),
      'message'           => new sfWidgetFormFilterInput(),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'md_user_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('mdUser'), 'column' => 'id')),
      'md_apartamento_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('mdApartamento'), 'column' => 'id')),
      'fecha_desde'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'fecha_hasta'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'cantidad_personas' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'md_currency_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('mdCurrency'), 'column' => 'id')),
      'total'             => new sfValidatorPass(array('required' => false)),
      'status'            => new sfValidatorChoice(array('required' => false, 'choices' => array('pending' => 'pending', 'confirm' => 'confirm', 'efective' => 'efective', 'cancel' => 'cancel', 'cancelPayPal' => 'cancelPayPal', 'errorPayPal' => 'errorPayPal'))),
      'message'           => new sfValidatorPass(array('required' => false)),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('md_reserva_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mdReserva';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'md_user_id'        => 'ForeignKey',
      'md_apartamento_id' => 'ForeignKey',
      'fecha_desde'       => 'Date',
      'fecha_hasta'       => 'Date',
      'cantidad_personas' => 'Number',
      'md_currency_id'    => 'ForeignKey',
      'total'             => 'Text',
      'status'            => 'Enum',
      'message'           => 'Text',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
    );
  }
}
