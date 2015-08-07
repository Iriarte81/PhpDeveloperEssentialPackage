<?php

/* The Chain of Responsibility Pattern:
 * We can chain object calls,
 * while giving each object the ability to end
 * the execution or pass the request down the
 * chain.
 *
 */

abstract class HomeChecker {

    protected $successor;

    public abstract function check(HomeStatus $home);

    public function setSuccessor(HomeChecker $successor)
    {
        $this->successor = $successor;
    }

    public function next(HomeStatus $home)
    {
        if ($this->successor)
        {
            $this->successor->check($home);
        }
    }

}


class Locks extends HomeChecker {
    public function check(HomeStatus $home)
    {
        if (! $home->locked)
        {
            throw new Exception('The doors are not locked!! Abort!');
        }

        $this->next($home);
    }
}

class Lights extends HomeChecker {
    public function check(HomeStatus $home)
    {
        if (! $home->lightsOff)
        {
            throw new Exception('The lights are not off!! Abort!');
        }

        $this->next($home);
    }
}

class Alarm extends HomeChecker {
    public function check(HomeStatus $home)
    {
        if (! $home->alarmOn)
        {
            throw new Exception('The alarm is not on!! Abort!');
        }

        $this->next($home);
    }
}

class HomeStatus {
    public $locked = true;
    public $lightsOff = true;
    public $alarmOn = true;
}

$locks = new Locks;
$lights = new Lights;
$alarm = new Alarm;

// Below is the chain

$locks->setSuccessor($lights);
$lights->setSuccessor($alarm);

// Set it in motion by setting a check
// method on the first ring on the chain (locks)
$locks->check(new HomeStatus);