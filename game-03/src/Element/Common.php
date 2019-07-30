<?php

namespace App\Element;

// A common element
class Common extends Base {

    function quality_function() {
        if ($this->sellIn < 0) {
            return max(0, $this->quality - 2);
        } else {
            return max(0, $this->quality - 1);
        }
    }

}

?>