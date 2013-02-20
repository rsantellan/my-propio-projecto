<?php

/**
 * reservas actions.
 *
 * @package    rentNchill
 * @subpackage reservas
 * @author     Rodrigo Santellan
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class reservasActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    
  }
  
  public function executeEstadisticas(sfWebRequest $request)
  {
    $this->status = Doctrine::getTable('mdReserva')->statusEstadistic();
    
    $auxCurrency = Doctrine::getTable('mdReserva')->currencyEstadistic();
    $auxLocation = Doctrine::getTable('mdReserva')->locationEstadistic();
    $auxCreatedAt = Doctrine::getTable('mdReserva')->createdAtEstadistic();
    $auxFromDate = Doctrine::getTable('mdReserva')->fromDateEstadistic();
    
    $currency = array();
    foreach($auxCurrency as $aux)
    {
      $tmp = array();
      $tmp['cantidad'] = $aux['cantidad'];
      $tmp['moneda'] = Doctrine::getTable('mdCurrency')->find($aux['md_currency_id'])->getSymbol();
      $currency[] = $tmp;
    }
    $this->currency = $currency;
    
    $location = array();
    foreach($auxLocation as $aux)
    {
      $tmp = array();
      $tmp['cantidad'] = $aux['cantidad'];
      $tmp['lugar'] = Doctrine::getTable('mdLocacion')->find($aux['md_locacion_id'])->getNombre();
      $location[] = $tmp;
    }
    $this->locations = $location;
    
    $auxMeses = array(1 => 0, 2=>0, 3=>0, 4=>0, 5=>0, 6=>0, 7=>0, 8=>0, 9=>0, 10=>0, 11=>0, 12=>0);
    foreach($auxCreatedAt as $created_at)
    {
      $auxMeses[$created_at["mes"]] = $created_at['cantidad'];
    }
    
    $this->created_at = $auxMeses;
    
    $auxMeses1 = array(1 => 0, 2=>0, 3=>0, 4=>0, 5=>0, 6=>0, 7=>0, 8=>0, 9=>0, 10=>0, 11=>0, 12=>0);
    foreach($auxFromDate as $created_at)
    {
      $auxMeses1[$created_at["mes"]] = $created_at['cantidad'];
    }
    
    $this->from_date = $auxMeses1;
  }
  
  public function executeEstadisticasUsuarios(sfWebRequest $request)
  {
    sfContext::getInstance()->getConfiguration()->loadHelpers(array('I18N'));
    $estados = array(
            'pending' => __('reserva_estado pending'), 
            'confirm' => __('reserva_estado confirm'), 
            'efective' => __('reserva_estado efective'), 
            'cancel' => __('reserva_estado cancel'), 
            'cancelPayPal' => __('reserva_estado cancelPayPal'), 
            'errorPayPal' => __('reserva_estado errorPayPal'), 
            'prePayPal' => __('reserva_estado prePayPal')
            );
    $lista = array();
    foreach($estados as $key => $value)
    {
      $aux = array('datos' => Doctrine::getTable('mdReserva')->retrieveUsersWithEspecifications($key),
            'titulo' => $value
          );
      if(count($aux['datos']) > 0)
      {
        $lista[$key] = $aux;
      }
      
    }
    $this->listados = $lista;
    //var_dump($lista);
  }
}
