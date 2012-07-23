<?php

/**
 * mdApartamento filter form base class.
 *
 * @package    rentNchill
 * @subpackage filter
 * @author     maui
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasemdApartamentoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'md_locacion_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('mdLocacion'), 'add_empty' => true)),
      'activo'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'tipo'              => new sfWidgetFormChoice(array('choices' => array('' => '', 'comission' => 'comission', 'fullservice' => 'fullservice'))),
      'md_user_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('mdUser'), 'add_empty' => true)),
      'md_currency_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('mdCurrency'), 'add_empty' => true)),
      'precio_alta'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'precio_media'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'precio_baja'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cantidad_personas' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'md_comodidad_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'mdComodidad')),
    ));

    $this->setValidators(array(
      'md_locacion_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('mdLocacion'), 'column' => 'id')),
      'activo'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'tipo'              => new sfValidatorChoice(array('required' => false, 'choices' => array('comission' => 'comission', 'fullservice' => 'fullservice'))),
      'md_user_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('mdUser'), 'column' => 'id')),
      'md_currency_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('mdCurrency'), 'column' => 'id')),
      'precio_alta'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'precio_media'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'precio_baja'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'cantidad_personas' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'md_comodidad_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'mdComodidad', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('md_apartamento_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addMdComodidadListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.mdApartamento_mdComodidad mdApartamento_mdComodidad')
      ->andWhereIn('mdApartamento_mdComodidad.md_comodidad_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'mdApartamento';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'md_locacion_id'    => 'ForeignKey',
      'activo'            => 'Boolean',
      'tipo'              => 'Enum',
      'md_user_id'        => 'ForeignKey',
      'md_currency_id'    => 'ForeignKey',
      'precio_alta'       => 'Number',
      'precio_media'      => 'Number',
      'precio_baja'       => 'Number',
      'cantidad_personas' => 'Number',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
      'md_comodidad_list' => 'ManyKey',
    );
  }
}
