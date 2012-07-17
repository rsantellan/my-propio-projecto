<?php

$start = '2008-01-01';
$end   = '2008-12-31';

// Create objects from our date strings
$utc      = new DateTimeZone('UTC');
$start    = new DateTime($start, $utc);
$end      = new DateTime($end, $utc);

// Quick hack to include the end date in the period
$end->modify('+1 second');

// Create the Interval (1 day) and period (between start and end dates)
$interval = DateInterval::createFromDateString('+1 day');
$period   = new DatePeriod($start, $interval, $end);


$cantidades = array();
// Iterate over the period, outputting dates
foreach ($period as $datetime)
{
  $cantidades[] = $datetime->format('jS M Y');
    echo $datetime->format('jS M Y'), "\n";
}
var_dump(count($cantidades));
