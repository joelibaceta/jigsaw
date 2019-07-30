<?php

namespace App\Element;

// A Legendary element as "Aged Brie"
//
// This element actually increases in Quality the older it gets.
// Once the sell by date has passed, Quality degrades twice as fast
//
class Vintage extends Base {

    public function quality_function() {
        if ($this->sellIn >= 0) {
            return min(50, $this->quality + 1);
        } else {
            return min(50, $this->quality + 2);
        }
    }

}

?>