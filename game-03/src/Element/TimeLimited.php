<?php

namespace App\Element;

// A TimeLimited element as "Backstage passes"
//
// This element actually increases in Quality the older it gets.
//
// The Quality increases by 2 when there are 10 days 
// or less and by 3 when there are 5 days or less 
// but Quality drops to 0 after that SellIn reaches 0.
//
class TimeLimited extends Base {

    function quality_function() {
        switch (true) {
            case ($this->sellIn <= 10 && $this->sellIn > 5):
                return min(50, $this->quality + 2);
            case ($this->sellIn <= 5 && $this->sellIn >= 0):
                return min(50, $this->quality + 3);
            case ($this->sellIn < 0):
                return 0;
            default:
                return min(50, $this->quality + 1);
        }
    }

}

?>