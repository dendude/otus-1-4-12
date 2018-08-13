<?php
namespace DenDude\Strategy;

/**
 * Interface OperationInterface
 * @package DenDude\Strategy
 */
interface OperationInterface
{
    public function exec(int $a, int $b): int;
}