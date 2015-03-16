<?php

$myFile = "testFile.csv";
$fhw = fopen($myFile, 'w');

$filename = "./base.csv";
if ($fh = fopen($filename, "r")) 
{
  while (!feof($fh)) {
     $line = fgets($fh);
     $list = explode(';', $line);
     if(count($list) == 3)
     {
       $name = $list[0]." ".$list[1];
       $email = $list[2];
       $name = str_replace('"', '', $name);
       $name = str_replace("'", '', $name);
       $email = str_replace('"', '', $email);
       $email = str_replace("'", '', $email);
       $email = trim($email);
       if(strlen($name) == 1)
       {
         $name = $email;
       }
       if(strlen($email) > 0)
       {
        $email .= PHP_EOL;
        fwrite($fhw, $name.",".$email);
       }
       
       //var_dump($name.",".$email);
        //var_dump($list);
     }
     else
     {
       var_dump($list);
     }
     
     //echo $line;
  }
  fclose($fh);
}
  
fclose($fhw);
