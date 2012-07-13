<?php

/**
 * mdApartamento form.
 *
 * @package    rentNchill
 * @subpackage form
 * @author     maui
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mdApartamentoFrontendForm extends BasemdApartamentoForm
{
  public function configure()
  {
		parent::configure();
		unset($this['created_at'],$this['updated_at']);
		
		$locaciones = Doctrine::getTable('mdLocacion')->findAll();
		$choices = array();
		$v_choices = array();
		foreach($locaciones as $locacion){
			$choices[$locacion->getId()] = $locacion->getNombre();
			$v_choices[] = $locacion->getId();
		}
		
		$this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'md_locacion_id'    => new sfWidgetFormChoiceAutocompleteComboBox(array('choices'=>$choices)),
      'activo'            => new sfWidgetFormInputHidden(),
      'tipo'              => new sfWidgetFormInputHidden(),
      'md_user_id'        => new sfWidgetFormInputHidden(),
      'md_currency_id'    => new sfWidgetFormInputHidden(),
      'precio_alta'       => new sfWidgetFormInputText(),
      'precio_baja'       => new sfWidgetFormInputText(),
      'cantidad_personas' => new sfWidgetFormInputText()
    ));		
    $this->widgetSchema->setNameFormat('md_apartamento_frontend[%s]');

		if(sfContext::hasInstance()){
			$culture = sfContext::getInstance()->getUser()->getCulture();
		}else{
			$culture = 'es';
		}
		$this->embedI18n(array($culture));
		//$transForm = new mdApartamentoTranslationForm(null, array('culture'=>$culture));
		unset($this['copete']);
		
		//$this->embedForm($culture, $transForm);

				
  }

}
