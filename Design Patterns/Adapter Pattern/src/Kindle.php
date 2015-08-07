<?php namespace Acme;

class Kindle implements eReaderInterface, eReaderInterface
{

    public function turnOn()
    {
        var_dump('turn on the kindle');
    }

    public function pressNextButton()

    {
        var_dump('press the next button on the kindle');
    }
}