<?php

// This gives us a way for objects to notify one another without being intrisinscally linked 
// A change in one object needs to have a decoupled way to notify other objects

interface Subject {
	
	public function attach($observable);
	public function detach($observer);
	public function notify();
}

interface Observer {
	public function handle();
}

class Login implements Subject {


	protected $observers = [];

	public function attach(Observer $observer) {

		if (is_array($observable)) {

			foreach ($observable as $observer) {

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

	public function fire() {

		//perfom the login
		$this->notify();
	}


	public function detach($index) {

		unset($this->observers[$index]);

	}

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

?>