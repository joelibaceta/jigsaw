<?php

require_once "iSolverStrategy.php";

class SolverRecursiveStrategy implements ISolverStrategy {

    // Solve using a recursive strategy
    public function solve($m, $n): array {
        
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