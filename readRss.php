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

 // create lastRSS object
 $rss = new lastRSS;

 // setup transparent cache
 $rss->cache_dir = './cache';
 $rss->cache_time = 3600; // one hour

 // load some RSS file
 if ($rs = $rss->get('http://www.nbc.com.uy/nbc/modules/mod_nbccotizaciones/rss.php')) {
 // here we can work with RSS fields
 //var_dump($rs);
 foreach($rs['items'] as $item)
 {
    var_dump($item['description']);
 }
 
 }
 else {
 die ('Error: RSS file not found...');
 }
