<?php

namespace App\Element;

// A Conjured element
//
// This element degrade in Quality twice as fast as normal items.
//
class Conjured extends Base {

    function quality_function() {
        if ($this->sellIn < 0) {
            return max(0, $this->quality - 4);
        } else {
            return max(0, $this->quality - 2);
        }
    }
    
}

?>