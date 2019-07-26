<?php

// An interface to define the solver contract implementation
interface ISolverStrategy {
    public function solve($m, $n): array;
}

?>