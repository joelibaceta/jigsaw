<?php

require_once "Solver.php";
require_once "SolverClassicStrategy.php";
require_once "SolverRecursiveStrategy.php";
 
use PHPUnit\Framework\TestCase;

class Game01Test extends TestCase
{   
    private $cases;

    // Loading Tests Cases from file
    function setUp()
    {
        $data = file_get_contents(__DIR__ . '/cases.json'); 
        $this->cases = json_decode($data, true); 
    }
    
    public function testRecursiveStrategy()
    {   
        $solver = new Solver(new SolverRecursiveStrategy);
        $this->assertFromData($solver);
    }

    public function testClassictrategy()
    {   
        $solver = new Solver(new SolverClassicStrategy);
        $this->assertFromData($solver);
    }

    // Running Tests using Data Driven Testing
    private function assertFromData($solver)
    {
        foreach ($this->cases as $case) {
            $result = $solver->run($case["m"], $case["n"]);
            $this->assertEquals($result, $case["solution"]);
        }
    }

}

?>