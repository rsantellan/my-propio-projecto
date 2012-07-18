<?php

/**
 * mdApartamento form base class.
 *
 * @method mdApartamento getObject() Returns the current form's model object
 *
 * @package    rentNchill
 * @subpackage form
 * @author     maui
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasemdApartamentoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'md_locacion_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('mdLocacion'), 'add_empty' => false)),
      'activo'            => new sfWidgetFormInputCheckbox(),
      'tipo'              => new sfWidgetFormChoice(array('choices' => array('comission' => 'comission', 'fullservice' => 'fullservice'))),
      'md_user_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('mdUser'), 'add_empty' => true)),
      'md_currency_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('mdCurrency'), 'add_empty' => false)),
      'precio_alta'       => new sfWidgetFormInputText(),
      'precio_media'      => new sfWidgetFormInputText(),
      'precio_baja'       => new sfWidgetFormInputText(),
      'cantidad_personas' => new sfWidgetFormInputText(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
      'md_comodidad_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'mdComodidad')),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'md_locacion_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('mdLocacion'))),
      'activo'            => new sfValidatorBoolean(array('required' => false)),
      'tipo'              => new sfValidatorChoice(array('choices' => array(0 => 'comission', 1 => 'fullservice'))),
      'md_user_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('mdUser'), 'required' => false)),
      'md_currency_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('mdCurrency'), 'required' => false)),
      'precio_alta'       => new sfValidatorNumber(),
      'precio_media'      => new sfValidatorNumber(),
      'precio_baja'       => new sfValidatorNumber(),
      'cantidad_personas' => new sfValidatorInteger(array('required' => false)),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
      'md_comodidad_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'mdComodidad', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('md_apartamento[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'mdApartamento';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['md_comodidad_list']))
    {
      $this->setDefault('md_comodidad_list', $this->object->mdComodidad->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->savemdComodidadList($con);

    parent::doSave($con);
  }

  public function savemdComodidadList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['md_comodidad_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->mdComodidad->getPrimaryKeys();
    $values = $this->getValue('md_comodidad_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('mdComodidad', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('mdComodidad', array_values($link));
    }
  }

}
