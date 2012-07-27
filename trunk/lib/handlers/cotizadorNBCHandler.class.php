<?php

/**
 * Description of TemporadasDatesHandler
 *
 * @author Rodrigo Santellan
 */
class cotizadorNBCHandler 
{
  const RSS = 'http://www.nbc.com.uy/nbc/modules/mod_nbccotizaciones/rss.php';
  
  public static function actualizarCotizacionesDolaresEuros()
  {
    // create lastRSS object
    $rss = new lastRSS;
    $rss->cache_dir = sfConfig::get('sf_cache_dir');
    $rss->cache_time = 3600; // one hour
    if ($rs = $rss->get(self::RSS)) 
    {
      $euros = 0;
      $dolares = 0;
      foreach($rs['items'] as $item)
      {
        if($item['title'] == "EUROS BILLETE")
        {
          $euros = self::getVenta(self::strip_cdata($item['description']));
        }
        if($item['title'] == "DOLARES USA BILLETE")
        {
          $dolares = self::getVenta(self::strip_cdata($item['description']));
        }
      }
      //var_dump($euros);
      //var_dump($dolares);
      //var_dump($dolares / $euros);
      //var_dump($euros / $dolares);
      $dolarEuro = Doctrine::getTable('mdCurrencyConvertion')->getCurrenyConvertionBase(2,1);
      $euroDolar = Doctrine::getTable('mdCurrencyConvertion')->getCurrenyConvertionBase(1,2);
      
      $dolarEuro->setRatio($dolares / $euros);
      $euroDolar->setRatio($euros / $dolares);
      $dolarEuro->save();
      $euroDolar->save();
      //var_dump($dolarEuro->toArray());
      //var_dump($euroDolar->toArray());
    }
    else
    {
      throw new Exception("No se pudo leer el rss", 3002);
    }
  }
  
  public static function strip_cdata($string) 
  { 
    preg_match_all('/<!\[cdata\[(.*?)\]\]>/is', $string, $matches); 
    return str_replace($matches[0], $matches[1], $string); 
  }
  
  public static function getVenta($string)
  {
    $list = explode(' - ', $string);
    $aux = str_replace("Venta ", "", $list[1]);
    return (float) $aux;
  }
  
}
