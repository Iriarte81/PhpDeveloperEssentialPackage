<?php

// This gives us a way for objects to notify
// one another without being intrisinscally linked 
// A change in one object needs to have a 
// decoupled way to notify other objects

// this is what laravel does with Events
// Events listen for an action, when that action
// happens many events can be fired at the same
// time, we only need to register them

// in the example of a newsleetter you can subscribe to
// the subject is the publisher

interface Subject { 
	
	public function attach(observable);
	public function detach($index);
	public function notify();
}

// the observer is the subscriber
interface Observer {
	// the observer will need to be triggered
	public function handle();
}

class Login implements Subject {


	protected $observers = [];

	// you attach to the observer array
	public function attach($observable) {

		// if you gave us an array, then
		// for each item...
		if (is_array($observable)) {

			foreach ($observable as $observer) {

				// make sure $observer is an instance
				// of Observer so that the handle
				// method is required
				if (! $observer instanceof Observer) {

					throw new Exception;
				}

				$this->attach($observer);
			}

			return;
		}


		$this->observers[] = $observer;

		return $this;

	}

	// fire and notify
	public function fire() {

		//perfom the login
		$this->notify();
	}


	public function detach($index) {

		unset($this->observers[$index]);

	}

	// filter through all of the observers and
	//  trigger them with the handle method
	public function notify() {

		foreach ($this->observers as $observer) {

			$observer->handle();
		}


	}

}

class LogHandler implements Observer {

	public function handle() {

		var_dump('log something important');
	}
}


class EmailNotifier implements Observer {

	public function handle() {

		var_dump('fire off an email');
	}
}

class LoginReporter implements Observer {

	public function handle() {

		var_dump('do some form of reporting');
	}
}



$login = new Login;
$login->attach([
	new LogHandler,
	new EmailNotifier,
	new LoginReporter
]);

// if i require new functionality like LoginReporter
// in response to a user login in, i can create
// an object have it implement the interface and pass
// it on above (in light blue).
// we have extended the functionality without
// modifying the loggin in function
// this is a way of objects to notify one another
// without being intrisically linked
?>