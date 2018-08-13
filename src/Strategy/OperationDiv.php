<?php
namespace DenDude\Strategy;

/**
 * Class OperationAdd
 * @package DenDude\Strategy
 */
class OperationDiv implements OperationInterface
{
    const DIVIDE_BY_ZERO = 1001;

    public function exec(int $a, int $b): int
    {
        if ($b === 0) {
            throw new \LogicException('You cannot divide by zero!', self::DIVIDE_BY_ZERO);
        }

        return floor($a / $b);
    }
}