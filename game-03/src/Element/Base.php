<?php

namespace App\Element;

// A generic element definition
abstract class Base {
    public $name; 
    public $quality;
    public $sellIn;
    public $uuid;

    abstract function quality_function();

    static function Factory($strType){
        return new $strType;
    }

    function __constructor(){
        $this->uuid = uniqid();
        return $this;
    }

    function withDaysToExpire($sellIn){
        $this->sellIn = $sellIn;
        return $this;
    }

    function withInitialQuality($quality){
        $this->quality = $quality;
        return $this;
    }

    function withName($name){
        $this->name = $name;
        return $this;
    }

    function tick() {
        if (isset($this->sellIn)) {
            $this->sellIn -= 1;
        } 
        $this->quality = $this->quality_function();

    }
    
}


?>