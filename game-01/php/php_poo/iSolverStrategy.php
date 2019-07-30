<?php

// An interface to define the solver contract implementation
interface ISolverStrategy {
    public function solve(array $m, int $n): array;
}

?>