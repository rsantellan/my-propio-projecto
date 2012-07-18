<?php

/**
 * mdGenericSaleItem filter form base class.
 *
 * @package    rentNchill
 * @subpackage filter
 * @author     maui
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasemdGenericSaleItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'object_id'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'object_class'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'md_generic_sale_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('mdGenericSale'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'object_id'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'object_class'       => new sfValidatorPass(array('required' => false)),
      'md_generic_sale_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('mdGenericSale'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('md_generic_sale_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mdGenericSaleItem';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'object_id'          => 'Number',
      'object_class'       => 'Text',
      'md_generic_sale_id' => 'ForeignKey',
    );
  }
}
