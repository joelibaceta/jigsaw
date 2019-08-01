<?php

require_once __DIR__ . "/phpSolution.php";
 
use PHPUnit\Framework\TestCase;

class Game01Test extends TestCase
{
    protected $cases;

    // Loading Tests Cases from file
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

    // Running Tests using Data Driven Testing
    private function assertFromData($callableMethod)
    {
        foreach ($this->cases as $case) {
            $result = $callableMethod($case["m"], $case["n"]);
            $this->assertEquals($result, $case["solution"]);
        }
    }
}

?>