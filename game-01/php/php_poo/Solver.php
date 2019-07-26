<?php

// Main solver class
class Solver 
{
    private $strategy;

    // Require a strategy to initialize
    public function __construct(ISolverStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    // Set an specific strategy to solve the problem
    public function setStrategy(ISolverStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    // Run the main method
    public function run($m, $n) : array
    {
        return $this->strategy->solve($m, $n);
    }
}

?>