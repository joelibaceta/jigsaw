<?php

// A simple script which contains 
// some useful implementations to solve the problem


// A simple iteration method
function IterationWay($m, $n) {

    $m = array_values(array_filter($m, function ($x) use ($n) { return $x <= $n; }));

    for ($i = 0; $i < count($m); $i++) {
        for ($j = $i+1; $j < count($m) - 1; $j++) {
            if ($m[$i] + $m[$j] == $n) {
                return array($m[$i], $m[$j]);
            }
        }
    }
    return [];
}

// A recursive version
function RecursiveWay($m, $n, $index=0) {
    if ($index == count($m)-1){
        return [];
    } else {
        for ($i = ($index + 1); $i < count($m); $i++) {
            if ($m[$index] + $m[$i] == $n) {
                return array($m[$index], $m[$i]);
            }
        }
        return RecursiveWay($m, $n, $index+1);
    }
}

?>