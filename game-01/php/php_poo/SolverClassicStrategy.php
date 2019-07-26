<?php

require_once "iSolverStrategy.php";

class SolverClassicStrategy implements ISolverStrategy {

    // Solve using the classical iteration method
    function solve($m, $n): array {
        for ($i = 0; $i < (count($m) - 1); $i++) {
            if ($m[$i] + $m[$i+1] == $n) {
                return array($m[$i], $m[$i+1]);
            }
        }
        return [];
    }

}

?>