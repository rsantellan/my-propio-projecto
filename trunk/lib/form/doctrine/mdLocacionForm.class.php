<?php

/**
 * mdLocacion form.
 *
 * @package    rentNchill
 * @subpackage form
 * @author     maui
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mdLocacionForm extends BasemdLocacionForm
{
  public function configure()
  {
		parent::configure();
		if(sfContext::hasInstance()){
			$culture = sfContext::getInstance()->getUser()->getCulture();
		}else{
			$culture = 'es';
		}
		$this->embedI18n(array($culture));
		
		$this->setWidget('country',new sfWidgetFormI18nChoiceCountry(array('culture' => $culture)));
		$this->setValidator('country',new sfValidatorI18nChoiceCountry());
		$this->widgetSchema->setLabel($culture, 'Info que se traduce');
		$this->setDefault('country', 'UY');
  }
}
