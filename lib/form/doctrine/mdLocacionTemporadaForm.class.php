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
    $this->widgetSchema['date_from'] = new sfWidgetFormInputDatepicker();
	$this->widgetSchema['date_to'] = new sfWidgetFormInputDatepicker();
	$this->validatorSchema['date_from'] = new sfExtraValidatorDatepicker(array('required' => true));
	$this->validatorSchema['date_to'] = new sfExtraValidatorDatepicker(array('required' => true));
    /*
    $this->validatorSchema['date_from'] = new sfValidatorDateRange(
                array(
                    'from_date' => new sfValidatorDate(
                            array('required' => false)
                            ), 
                    'from_field' => 'date_from',
                    'to_date' => new sfValidatorDate(
                            array(
                                'required' => false)
                            ),
                    'to_field' => 'date_to'
                    ));
     * 
     */
	/*
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
    */
  }
}
