<?php

require_once "iSolverStrategy.php";

class SolverRecursiveStrategy implements ISolverStrategy {

    /**
     *
     * Solve using a recursive strategy
     *
     * @param array $m Set of integer numbers
     * @param int   $n Expected sum
     *
     * @return array
     */
    public function solve(array $m, int $n, int $index = 0): array {
        
        if ($index == count($m)-1){
            return [];
        } else {
            for ($i = ($index + 1); $i < count($m); $i++) {
                if ($m[$index] + $m[$i] == $n) {
                    return array($m[$index], $m[$i]);
                }
            }
            return $this->solve($m, $n, $index+1);
        }
    }

}

?>