<?php
namespace DenDude\Strategy;

/**
 * Class Calculator
 *
 * @property OperationInterface $strategy
 *
 * @package DenDude\Strategy
 */
class Calculator
{
    const OP_ADD = '+';
    const OP_SUB = '-';
    const OP_MUL = '*';
    const OP_DIV = '/';

    protected $strategy;

    protected $accumulator = 0;

    public function __construct($operation = self::OP_ADD)
    {
        $this->setStrategy($operation);
    }

    public function exec(int $a, int $b): int
    {
        $this->accumulator = $this->strategy->exec($a, $b);

        return $this->accumulator;
    }

    public function execNext(int $b)
    {
        return $this->exec($this->accumulator, $b);
    }

    public function resetAccumulator()
    {
        $this->accumulator = 0;
    }

    public function setStrategy(string $operation)
    {
        switch ($operation) {

            case self::OP_ADD: $this->strategy = new OperationAdd(); break;
            case self::OP_SUB: $this->strategy = new OperationSub(); break;
            case self::OP_MUL: $this->strategy = new OperationMul(); break;
            case self::OP_DIV: $this->strategy = new OperationDiv(); break;

            default:
                throw new \LogicException('Operation does not exist');
        }
    }
}