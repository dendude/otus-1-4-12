<?php
namespace DenDude\Strategy;

/**
 * Class OperationAdd
 * @package DenDude\Strategy
 */
class OperationMul implements OperationInterface
{
    public function exec(int $a, int $b): int
    {
        return ($a * $b);
    }
}