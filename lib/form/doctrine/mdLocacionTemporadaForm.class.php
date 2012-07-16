<?php

/**
 * mdLocacionTemporada form.
 *
 * @package    rentNchill
 * @subpackage form
 * @author     maui
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mdLocacionTemporadaForm extends BasemdLocacionTemporadaForm
{
  public function configure()
  {
	$culture = sfContext::getInstance()->getUser()->getCulture();
	$months_names = sfDateTimeFormatInfo::getInstance($culture)->getMonthNames();
	$months = array();
	for($i=1;$i<=12;$i++){
		$months[$i]=$months_names[$i-1];
	}
	
	$this->widgetSchema['mes_desde'] = new sfWidgetFormChoice(array('choices'=>$months));
	$this->widgetSchema['mes_hasta'] = new sfWidgetFormChoice(array('choices'=>$months));
	
    $this->validatorSchema['dia_desde'] = new sfValidatorInteger(array('max' => 31, 'min' => 0));
    $this->validatorSchema['dia_hasta'] = new sfValidatorInteger(array('max' => 31, 'min' => 0));
  }
}
