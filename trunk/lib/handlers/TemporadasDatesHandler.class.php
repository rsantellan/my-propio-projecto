<?php

/**
 * Description of TemporadasDatesHandler
 *
 * @author Rodrigo Santellan
 */
class TemporadasDatesHandler 
{
  public static function insertLocationFirstYear($location_id = null)
  {
	if(!is_null($location_id))
	{
	  //Tengo uno solo.
	  self::actualInsertLocationFirstYear($location_id);
	}
	else
	{
	  //Tengo que hacerlo para todos.
	  $locations = Doctrine::getTable('mdLocacion')->findAll();
	  foreach($locations as $location)
	  {
		self::actualInsertLocationFirstYear($location->getId());
	  }
	}
  }
  
  private static function actualInsertLocationFirstYear($location_id)
  {
	//Los mismos son cualquiera, tengo que ponerlos bien.
	$start = '2012-01-01';
	$end   = '2012-12-31';

	self::actualAddDates($start, $end, $location_id);
  }
  
  private static function actualAddDates($start, $end, $location_id)
  {
		// Create objects from our date strings
	$utc      = new DateTimeZone('UTC');
	$start    = new DateTime($start, $utc);
	$end      = new DateTime($end, $utc);
	// Quick hack to include the end date in the period
	$end->modify('+1 second');
	// Create the Interval (1 day) and period (between start and end dates)
	$interval = DateInterval::createFromDateString('+1 day');
	$period   = new DatePeriod($start, $interval, $end);
	// Iterate over the period, outputting dates
	foreach ($period as $datetime)
	{
	  $aux = $datetime->format('Y-m-d');
	  $obj = new temporadaAnual();
	  $obj->setFecha($aux);
	  $obj->setMdLocacionId($location_id);
	  $obj->save();
	}
  }
  
  public static function deleteOldEntries()
  {
	//Lo que mas me conviene es tirar una sql directo a la base
  }
  
  public static function addMonthToLocations()
  {
	$locations = Doctrine::getTable('mdLocacion')->findAll();
	foreach($locations as $location)
	{
	  /*
	   * Para cada locacion lo que tengo que hacer es preguntar la cantidad
	   * de dias que tienen en la base. Si la cantidad de dias es menor a X
	   * entonces les agrego un mes mas.
	  */
	}
	
  }
  
  
  public static function generateSeasons($location_id = null)
  {
	if(!is_null($location_id))
	{
	  //Tengo uno solo.
	  self::actualGenerateSeasons($location_id);
	}
	else
	{
	  //Tengo que hacerlo para todos.
	  $locations = Doctrine::getTable('mdLocacion')->findAll();
	  foreach($locations as $location)
	  {
		self::actualGenerateSeasons($location->getId());
	  }
	}		
  }
  
  private static function actualGenerateSeasons($location_id)
  {
	//Obtengo las temporadas
	$temporadas = Doctrine::getTable('mdLocacionTemporada')->findBy('md_locacion_id', $location_id);
	foreach($temporadas as $temporada)
	{
	  $dias = Doctrine::getTable('temporadaAnual')->retrieveByDatesAndLocation($location_id, $temporada->getDateFrom(), $temporada->getDateTo());
	  //var_dump($temporada->toArray());
	  foreach($dias as $dia)
	  {
		//var_dump($dia->toArray());
		$dia->setTipo($temporada->getTipo());
		$dia->save();
	  }
	}
  }
  
}


