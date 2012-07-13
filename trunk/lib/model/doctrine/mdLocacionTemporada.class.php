<?php

/**
 * mdLocacionTemporada
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    rentNchill
 * @subpackage model
 * @author     maui
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class mdLocacionTemporada extends BasemdLocacionTemporada
{

	public function getDesde(){
			if(sfContext::hasInstance()){
				$culture = sfContext::getInstance()->getUser()->getCulture();
				$months = sfDateTimeFormatInfo::getInstance($culture)->getMonthNames();
				$mes = $this->getMesDesde();
				$mes = $months[$mes-1];
				return $this->getDiaDesde() . ' ' . $mes;
			}else
			return $this->getDiaDesde() . '/' . $this->getMesDesde();
	}

	public function getHasta(){
		if(sfContext::hasInstance()){
			$culture = sfContext::getInstance()->getUser()->getCulture();
			$months = sfDateTimeFormatInfo::getInstance($culture)->getMonthNames();
			$mes = $this->getMesHasta();
			$mes = $months[$mes-1];
			return $this->getDiaHasta() . ' ' . $mes;
		}else
		return $this->getDiaHasta() . '/' . $this->getMesHasta();
	}
}
