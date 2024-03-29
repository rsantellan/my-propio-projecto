<?php

/**
 * mdGenericSale filter form base class.
 *
 * @package    rentNchill
 * @subpackage filter
 * @author     Rodrigo Santellan
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasemdGenericSaleFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'md_user_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('mdUser'), 'add_empty' => true)),
      'price'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'status'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'md_payment_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('mdGenericPayment'), 'add_empty' => true)),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'md_user_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('mdUser'), 'column' => 'id')),
      'price'         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'status'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'md_payment_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('mdGenericPayment'), 'column' => 'id')),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('md_generic_sale_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mdGenericSale';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'md_user_id'    => 'ForeignKey',
      'price'         => 'Number',
      'status'        => 'Number',
      'md_payment_id' => 'ForeignKey',
      'created_at'    => 'Date',
      'updated_at'    => 'Date',
    );
  }
}
