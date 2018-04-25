<?php
class Drink
{
    protected $name = null;

    protected function setDrinkName($name){
        $this->name = $name;
    }
    public function getDrinkName(){
        return $this->name;
    }
}