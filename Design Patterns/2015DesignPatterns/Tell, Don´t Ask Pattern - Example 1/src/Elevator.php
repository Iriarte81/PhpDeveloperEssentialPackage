<?php namespace Acme;

class Elevator {
	
	protected monitor;

	protected occupants = [];

	function __construct(EnviornmentMonitor $monitor)

	{
		$this->monitor = $monitor;
	}

	function addPerson($person)

	{
		$this->occupants[] = $person;

		$this->monitor->increaseTemperature();
	}

	public function monitor()
	{
		return $this->monitor;
	}

	// this is a wrapper method to direct the command
	// to the appropriate class in this case EnvironmentMonitor
	public function checkForAlarms() {

		$this->monitor->checkforAlarms();
	}

}