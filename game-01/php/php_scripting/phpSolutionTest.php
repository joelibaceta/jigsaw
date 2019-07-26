<?php

require_once __DIR__ . "/phpSolution.php";
 
use PHPUnit\Framework\TestCase;

class Game01Test extends TestCase
{
    protected $cases;

    function setUp()
    {
        $data = file_get_contents(__DIR__ . '/cases.json');
        $this->cases = json_decode($data, true);
    }

    public function testIterationWay()
    {
        $this->assertFromData("IterationWay");
    }

    public function testRecursiveWay()
    {
        $this->assertFromData("RecursiveWay");
    }

    private function assertFromData($callableMethod)
    {
        
        foreach ($this->cases as $case) {
            $result =Solver::$callableMethod($case["m"], $case["n"]);
            $this->assertEquals($result, $case["solution"]);
        }
    }
}

?>