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

}

?>