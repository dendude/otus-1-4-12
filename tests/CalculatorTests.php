<?php
namespace DenDude\Tests;

use DenDude\Strategy\Calculator;
use DenDude\Strategy\OperationDiv;
use PHPUnit\Framework\TestCase;

/**
 * Class CalculatorTests
 *
 * @property Calculator $strategy
 *
 * @package DenDude\Tests
 */
class CalculatorTests extends TestCase
{
    protected $strategy;

    protected function setUp()
    {
        $this->strategy = new Calculator();
    }

    protected function tearDown()
    {
        $this->strategy = null;
    }

    /**
     * @param $a
     * @param $b
     * @param $compare
     * @dataProvider addProvider
     */
    public function testAdd($a, $b, $compare)
    {
        $this->strategy->setStrategy(Calculator::OP_ADD);

        $result = $this->strategy->exec($a, $b);

        $this->assertEquals($result, $compare);
    }

    public function addProvider()
    {
        return [
            [2, 5, 7],
            [-2, 6, 4],
            [-10, -5, -15],
            [0, 0, 0],
            [0, 5, 5],
            [100, -100, 0],
        ];
    }

    /**
     * @param $a
     * @param $b
     * @param $compare
     * @dataProvider subProvider
     */
    public function testSub($a, $b, $compare)
    {
        $this->strategy->setStrategy(Calculator::OP_SUB);

        $result = $this->strategy->exec($a, $b);

        $this->assertEquals($result, $compare);
    }

    public function subProvider()
    {
        return [
            [2, 5, -3],
            [-2, 6, -8],
            [-10, -5, -5],
            [0, 0, 0],
            [0, 5, -5],
            [100, -100, 200],
        ];
    }

    /**
     * @param $a
     * @param $b
     * @param $compare
     * @dataProvider mulProvider
     */
    public function testMul($a, $b, $compare)
    {
        $this->strategy->setStrategy(Calculator::OP_MUL);

        $result = $this->strategy->exec($a, $b);

        $this->assertEquals($result, $compare);
    }

    public function mulProvider()
    {
        return [
            [2, 5, 10],
            [-2, 6, -12],
            [-10, -5, 50],
            [0, 0, 0],
            [0, 5, 0],
            [100, -100, -10000],
        ];
    }

    /**
     * @param $a
     * @param $b
     * @param $compare
     * @dataProvider divProvider
     */
    public function testDiv($a, $b, $compare)
    {
        $this->strategy->setStrategy(Calculator::OP_DIV);

        $result = $this->strategy->exec($a, $b);

        $this->assertEquals($result, $compare);
    }

    public function divProvider()
    {
        return [
            [2, 5, 0],
            [6, 2, 3],
            [-10, -5, 2],
            [0, 5, 0],
            [100, -100, -1],
        ];
    }

    public function testDivException()
    {
        $this->strategy->setStrategy(Calculator::OP_DIV);

        try {
            $this->strategy->exec(6, 0);
            $this->assertTrue(false, 'Has not exception');
        } catch (\LogicException $e) {
            $this->assertEquals($e->getCode(), OperationDiv::DIVIDE_BY_ZERO);
        }
    }
}