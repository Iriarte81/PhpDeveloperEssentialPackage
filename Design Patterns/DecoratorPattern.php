<?php

/*
The decorator pattern allows us to decorate objects with
objects and access a unique method whose result will vary
depending on how many objects we've decorated to it.
In this way we can aggegate behavior in our output.
To implement the decorator, all of our classes that will
be decorating will adhere to an interface and that interface
should be injected into the constructor of each new class
that registers behavior to add.
 */

interface CarService  {

 public function getCost();
 
 public function getDescription();
 }


 class BasicInspection implements CarService {

 	public function getCost(); { 
 
 		return 25; 
 	}

 	public function getDescription()
 	{
 		return 'Basic Inspection';
 	} 
 } 

 class OilChange implements CarService {

 protected $carService;

// we must inject an instance of the contract
// in each new class' constructor in order
// to make the decorator work
 function __construct(CarService $carService)  {

 	$this->carService = $carService;

	}

public function getCost() {

	return 29 + $this->carService->getCost(); 

	}

public function getDescription() {

	return $this->carService->getDescription() . ', and an oil change';
}
} 


class TireRotation implements CarService {

protected $carService;

function __construct(CarService $carService) {

	$this->carService = $carService; 

}

public function getCost() {

	return 15 + $this->carService->getCost();

}

public function getDescription() {

	return $this->carService->getDescription() . ', and a tire rotation';
}

// NOW THE DECORATION 

echo new TireRotation((new OilChange(new BasicInspection()))->getCost();

//or any combination of the objects

echo new TireRotation(new BasicInspection())->getCost;

// we can also new up an object and get the description decorating each object

$service = new TireRotation((new OilChange(new BasicInspection())))

$service->getDescription();