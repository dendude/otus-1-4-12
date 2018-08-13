#!/usr/bin/env php
<?php

require_once __DIR__ . '/vendor/autoload.php';

use DenDude\Strategy\Calculator;

$small_opts = 'a:b:';
$large_opts = ['a:', 'b:'];

$params = getopt($small_opts, $large_opts);

try {

    if (!isset($params['a'], $params['b'])) {
        throw new ErrorException('Please, enter a and b');
    }

    $a = $params['a'];
    $b = $params['b'];

    $strategy = new Calculator(Calculator::OP_ADD);

    $res1 = $strategy->exec($a, $b);
    echo "{$a} + {$b} = {$res1}" . PHP_EOL;

    $strategy->setStrategy(Calculator::OP_MUL);
    $res2 = $strategy->execNext($b);
    echo "{$res1} * {$b} = {$res2}" . PHP_EOL;

    $strategy->setStrategy(Calculator::OP_SUB);
    $res3 = $strategy->execNext($b);
    echo "{$res2} - {$b} = {$res3}" . PHP_EOL;

    $strategy->setStrategy(Calculator::OP_DIV);
    $res4 = $strategy->execNext($b);
    echo "{$res3} / {$b} = {$res4}" . PHP_EOL;

    $strategy->resetAccumulator();

    $strategy->exec($a, 0); // exception

} catch (Throwable $e) {
    echo $e->getMessage() . PHP_EOL;
    exit(1);
}