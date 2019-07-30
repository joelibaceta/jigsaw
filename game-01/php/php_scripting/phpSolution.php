<?php

// A simple script which contains 
// some useful implementations to solve the problem


// A simple iteration method
function IterationWay($m, $n) {
    for ($i = 0; $i < (count($m) - 1); $i++) {
        if ($m[$i] + $m[$i+1] == $n) {
            return array($m[$i], $m[$i+1]);
        }
    }
    return null;
}

// A recursive version
function RecursiveWay($m, $n) {
    $current = current($m);
    $next = next($m);

    if ($next) {
        if ($current + $next == $n ) { 
            return array($current, $next);
        } else {
            return RecursiveWay($m, $n);
        }
    }
    return null;
}



?>