<?php namespace Acme;

use Exception;

class EnvironmentMonitor {

	protected $temperature = 70;

	public function increaseTemperature($degrees = 10)
	{
		$this->temperature += $degrees;
	}

	public function temperature()
	
	{
		return $this->temperature;
	}

	public function triggerAlarm()
	{
		throw new Exception('Too hot! Alarm, Alarm!');
	}

	// it is not the Elevators' class' responsibility
	// to check if the temperature is high, it is
	// the EnvironmentMonitor's class' responsibility
	
	public function checkForAlarms() {

		if ($this->temperature >= 100)
		
		{
			$this->triggerAlarm();
		}

	}

}