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
    $start = date('Y-m-d');
    //var_dump($start);
    $nextYear = mktime(0, 0, 0, date("m"), date("d"),   date("Y")+1);
    $end = date('Y-m-d', $nextYear);
    //var_dump($nextYear);
    //var_dump($end);
    self::actualAddDates($start, $end, $location_id);
    //Los mismos son cualquiera, tengo que ponerlos bien.
	$start = '2008-01-01';
	$end   = '2008-12-31';
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
    $sql = "delete FROM temporada_anual where fecha < current_date";
    $conn = Doctrine_Manager::getInstance()->getCurrentConnection(); 
    $r = $conn->execute($sql);
    return $r;
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
	  foreach($dias as $dia)
	  {
		$dia->setTipo($temporada->getTipo());
		$dia->save();
	  }
	}
  }

  public static function addDaysToAllLocations()
  {
    //Borro mas viejo que hoy.
    self::deleteOldEntries();
    //Tengo que hacerlo para todos.
    $locations = Doctrine::getTable('mdLocacion')->findAll();
    foreach($locations as $location)
    {
      //Agrego hoy.
      //Me fijo si no existe.
      
      $hoy = Doctrine::getTable('temporadaAnual')->retrieveByDateAndLocation($location->getId(), date('Y-m-d'),strtotime("+1 years"));
      if(!$hoy)
      {
        $obj = new temporadaAnual();
        $obj->setFecha($hoy);
        $obj->setMdLocacionId($location->getId());
        $obj->save();
      }
      //Genero de vuelta las sesiones.
      self::actualGenerateSeasons($location->getId());
    }
    
  }
}


