<?php

require 'vendor/autoload.php';

(new App\TurkeySub)->make();
(new App\VeggieSub)->make();

/*
 * You add a protected abstract method/function
 * the class Sub (which is the parent class) of
 * Veggie Sub and Turkey Sub classes which is
 * like saying we NEED this method to perform
 * the operation in this case, make().
 * The contents of the abstract method itself
 * will be different for Veggie Sub or Turkey Sub.
 * Thus when you call make for each different object
 * you perform the operations in the parent class
 * of both objects without repeating code in each
 * specific class unnecessarily.
 *
 */