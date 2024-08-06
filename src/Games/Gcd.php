<?php

namespace Php\Project\Games\Gcd;

use function cli\line;
use function cli\prompt;
use function Php\Project\Engine\runGame;

use const Php\Project\Engine\RANDOM_MINIMUM_NUMBER;
use const Php\Project\Engine\RANDOM_MAXIMUM_NUMBER;

function runGameGcd()
{
    $rule = 'Find the greatest common divisor of given numbers.';
    $callback = function () {
        $firstNumber = rand(RANDOM_MINIMUM_NUMBER, RANDOM_MAXIMUM_NUMBER);
        $secondNumber = rand(RANDOM_MINIMUM_NUMBER, RANDOM_MAXIMUM_NUMBER);
        $arrayGcd = range(1, $firstNumber);
        $result = gcdNumber($arrayGcd, $firstNumber, $secondNumber);
        return [
            'question' => "{$firstNumber} {$secondNumber}",
            'correctAnswer' => $result
        ];
    };
    runGame($callback, $rule);
}

function gcdNumber(array $arrayGcd, int $firstNumber, int $secondNumber)
{
    $gcdMassiv = [];
    if ($firstNumber === 0 || $secondNumber === 0) {
        return 0;
    } else {
        foreach ($arrayGcd as $number) {
            if ($firstNumber % $number === 0 && $secondNumber % $number === 0) {
                $gcdMassiv[] = $number;
            };
        };
    }
    return max($gcdMassiv);
}
