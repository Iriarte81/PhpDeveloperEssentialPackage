<?php
/**
 * Created by PhpStorm.
 * User: Aurelia
 * Date: 22/07/2015
 * Time: 12:36 PM
 */
namespace Acme;

interface eReaderInterface
{
    public function turnOn();

    public function pressNextButton();
}