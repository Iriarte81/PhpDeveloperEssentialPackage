<?php namespace App;

class VeggieSub extends Sub{


    public function addPrimaryToppings()
    {
        var_dump('add some veggies');
        return $this;
    }
}