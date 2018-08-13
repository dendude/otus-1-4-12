<?php
namespace DenDude\Strategy;

/**
 * Class OperationAdd
 * @package DenDude\Strategy
 */
class OperationSub implements OperationInterface
{
    public function exec(int $a, int $b): int
    {
        return ($a - $b);
    }
}