<?php

require_once "iSolverStrategy.php";

class SolverClassicStrategy implements ISolverStrategy {

    /**
     *
     * Solve using the classical iteration method
     *
     * @param array $m Set of integer numbers
     * @param int   $n Expected sum
     *
     * @return array
     */
    function solve(array $m, int $n): array {
        for ($i = 0; $i < (count($m) - 1); $i++) {
            if ($m[$i] + $m[$i+1] == $n) {
                return array($m[$i], $m[$i+1]);
            }
        }
        return [];
    }

}

?>