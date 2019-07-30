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
    public function solve(array $m, int $n): array {
        
        $current = current($m);
        $next = next($m); 

        if ($next) {
            if ($current + $next == $n ) { 
                return array($current, $next);
            } else {
                return $this->solve($m, $n);
            } 
        }
        return []; 
    }

}

?>