<?php

namespace Php\Project\Games\Gcd;

use function cli\line;
use function cli\prompt;
use function Php\Project\Engine\runGame;

use const Php\Project\Engine\RANDOM_MINIMUM_NUMBER;
use const Php\Project\Engine\RANDOM_MAXIMUM_NUMBER;

const RULE_OF_THE_GAME = 'Find the greatest common divisor of given numbers.';

function runGameGcd()
{
    $rule = RULE_OF_THE_GAME;
    $callback = function () {
        $firstNumber = rand(RANDOM_MINIMUM_NUMBER, RANDOM_MAXIMUM_NUMBER);
        $secondNumber = rand(RANDOM_MINIMUM_NUMBER, RANDOM_MAXIMUM_NUMBER);
        $possibleDivisors = range(1, $firstNumber);
        $result = commonFactor($possibleDivisors, $firstNumber, $secondNumber);
        return [
            'question' => "{$firstNumber} {$secondNumber}",
            'correctAnswer' => $result
        ];
    };
    runGame($callback, $rule);
}

function commonFactor(array $possibleDivisors, int $firstNumber, int $secondNumber)
{
    $dividers = [];
    if ($firstNumber === 0 || $secondNumber === 0) {
        return 0;
    } else {
        foreach ($possibleDivisors as $number) {
            if ($firstNumber % $number === 0 && $secondNumber % $number === 0) {
                $dividers[] = $number;
            };
        };
    }
    return max($dividers);
}
