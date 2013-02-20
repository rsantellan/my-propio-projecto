<?php

/**
 * mdApartamento form.
 *
 * @package    rentNchill
 * @subpackage form
 * @author     maui
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mdApartamentoEditForm extends BasemdApartamentoForm
{
  public function configure()
  {
		parent::configure();
		unset($this['created_at'],$this['updated_at']);
		
		if(sfContext::hasInstance()){
			$culture = sfContext::getInstance()->getUser()->getCulture();
		}else{
			$culture = 'es';
		}
		$this->embedI18n(array($culture));

		$locaciones = Doctrine::getTable('mdLocacion')->findAll();
		$choices = array();
		$v_choices = array();
		foreach($locaciones as $locacion){
			$choices[$locacion->getId()] = $locacion->getNombre();
			$v_choices[] = $locacion->getId();
		}
		$this->widgetSchema['md_locacion_id'] = new sfWidgetFormChoiceAutocompleteComboBox(array('choices'=>$choices));

		$this->widgetSchema['tipo'] = new sfWidgetFormInputHidden();
		$this->widgetSchema['activo'] = new sfWidgetFormInputHidden();
		$this->widgetSchema['md_user_id'] = new sfWidgetFormInputHidden();
		$this->widgetSchema['md_currency_id'] = new sfWidgetFormInputHidden();

		$this->setDefault('md_currency_id', mdCurrencyHandler::getCurrent()->getId());

    $this->widgetSchema['md_comodidad_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'expanded' => true, 'model' => 'mdComodidad', 'label' => 'Comodidades'));
    $this->validatorSchema['md_comodidad_list'] = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'mdComodidad', 'required' => false));
		
  }

}
