<?php

/**
 * mdComodidad filter form base class.
 *
 * @package    rentNchill
 * @subpackage filter
 * @author     maui
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasemdComodidadFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'imagen'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'md_apartamento_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'mdApartamento')),
    ));

    $this->setValidators(array(
      'imagen'              => new sfValidatorPass(array('required' => false)),
      'md_apartamento_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'mdApartamento', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('md_comodidad_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addMdApartamentoListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('mdApartamento_mdComodidad.md_apartamento_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'mdComodidad';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'imagen'              => 'Text',
      'md_apartamento_list' => 'ManyKey',
    );
  }
}
