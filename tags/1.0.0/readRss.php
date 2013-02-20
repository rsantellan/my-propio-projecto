<?php  
  
function getFeed($feed_url) {  
      
    $content = file_get_contents($feed_url);  
    $x = new SimpleXmlElement($content);  
      
    //echo "<ul>";  
    var_dump($x);
    die;  
    foreach($x->channel->item as $entry) {  
        var_dump($entry);
        echo "<li><a href='$entry->link' title='$entry->title'>" . $entry->title . "</a></li>";  
    }  
    echo "</ul>";  
}  

//getFeed('http://www.nbc.com.uy/nbc/modules/mod_nbccotizaciones/rss.php');

// include lastRSS library
include './lastRSS.php';
function strip_cdata($string) 
{ 
  preg_match_all('/<!\[cdata\[(.*?)\]\]>/is', $string, $matches); 
  return str_replace($matches[0], $matches[1], $string); 
}
 
function getVenta($string)
{
  $list = explode(' - ', $string);
  $aux = str_replace("Venta ", "", $list[1]);
  return (float) $aux;
}
 // create lastRSS object
 $rss = new lastRSS;

 // setup transparent cache
 $rss->cache_dir = './cache';
 $rss->cache_time = 3600; // one hour

 // load some RSS file
 if ($rs = $rss->get('http://www.nbc.com.uy/nbc/modules/mod_nbccotizaciones/rss.php')) {
 // here we can work with RSS fields
 $euros = 0;
 $dolares = 0;
 
 foreach($rs['items'] as $item)
 {
   if($item['title'] == "EUROS BILLETE")
   {
     $euros = getVenta(strip_cdata($item['description']));
   }
   if($item['title'] == "DOLARES USA BILLETE")
   {
     $dolares = getVenta(strip_cdata($item['description']));
   }
    //var_dump($item);
    //var_dump($item['title']);
    //var_dump($item['description']);
 }
 
  var_dump($euros);
  var_dump($dolares);
  var_dump($dolares / $euros);
  var_dump($euros / $dolares);
 }
 else {
 die ('Error: RSS file not found...');
 }
