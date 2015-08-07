<?php

/*
 * Tell, Don't Ask.
 * 
 * As much as possible and when it's appropriate
 * we want to tell our objects what to do rather
 * than querying them for info on their state
 * and then make decisions as to what they should
 * do next.
 *
 * We want to tell objects what to do, rather
 * than querying them and acting on their behalf.
 */

require 'vendor/autoload.php';

$elevator = new Acme\Elevator(new Acme\ElevatorMonitor);

$elevator->addPerson('John Doe');
$elevator->addPerson('Jane Doe');
$elevator->addPerson('Frank Doe'); // the third person will push the temperature to
// 100 and trigger the alarm;


// below is a query method. It says "give me your temperature and then
// I will decide what happens next".
/*if ($elevator->monitor()->temperature() >= 100)
{
	$elevator->monitor()->triggerAlarm();
}
*/


$elevator->checkForAlarms();