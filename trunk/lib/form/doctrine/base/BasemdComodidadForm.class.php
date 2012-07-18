<?php

/**
 * mdComodidad form base class.
 *
 * @method mdComodidad getObject() Returns the current form's model object
 *
 * @package    rentNchill
 * @subpackage form
 * @author     maui
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasemdComodidadForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'imagen'              => new sfWidgetFormInputText(),
      'md_apartamento_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'mdApartamento')),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'imagen'              => new sfValidatorString(array('max_length' => 100)),
      'md_apartamento_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'mdApartamento', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('md_comodidad[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mdComodidad';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['md_apartamento_list']))
    {
      $this->setDefault('md_apartamento_list', $this->object->mdApartamento->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->savemdApartamentoList($con);

    parent::doSave($con);
  }

  public function savemdApartamentoList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['md_apartamento_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->mdApartamento->getPrimaryKeys();
    $values = $this->getValue('md_apartamento_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('mdApartamento', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('mdApartamento', array_values($link));
    }
  }

}
