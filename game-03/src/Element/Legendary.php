<?php

namespace App\Element;

// A Legendary element as "Sulfuras"
//
// - Quality starts at 80 and never changes
// - Never has to be sold or decreases in Quality
//
class Legendary extends Base {

    function __construct() {
        $this->quality = 80;
    }

    function withInitialQuality($quality){
        throw new Exception('you cannot assign an initial quality to a legendary element');
    }

    function quality_function() {
        return $this->quality;
    }

}

?>