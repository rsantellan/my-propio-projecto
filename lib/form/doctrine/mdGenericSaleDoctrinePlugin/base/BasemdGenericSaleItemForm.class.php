<?php

/**
 * mdGenericSaleItem form base class.
 *
 * @method mdGenericSaleItem getObject() Returns the current form's model object
 *
 * @package    rentNchill
 * @subpackage form
 * @author     Rodrigo Santellan
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasemdGenericSaleItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'object_id'          => new sfWidgetFormInputText(),
      'object_class'       => new sfWidgetFormInputText(),
      'md_generic_sale_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('mdGenericSale'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'object_id'          => new sfValidatorInteger(),
      'object_class'       => new sfValidatorString(array('max_length' => 128)),
      'md_generic_sale_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('mdGenericSale'))),
    ));

    $this->widgetSchema->setNameFormat('md_generic_sale_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mdGenericSaleItem';
  }

}
