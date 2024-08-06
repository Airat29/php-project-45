<?php

namespace Php\Project\Games\Calc;

use function cli\line;
use function cli\prompt;
use function Php\Project\Engine\runGame;

use const Php\Project\Engine\RANDOM_MINIMUM_NUMBER;
use const Php\Project\Engine\RANDOM_MAXIMUM_NUMBER;

function runGameCalc()
{
    $rule = 'What is the result of the expression?';
    $callback = function () {
        $sign = ['+', '-', '*'];
        $firstNumber = rand(RANDOM_MINIMUM_NUMBER, RANDOM_MAXIMUM_NUMBER);
        $secondNumber = rand(RANDOM_MINIMUM_NUMBER, RANDOM_MAXIMUM_NUMBER);
        $randOperator = $sign[array_rand($sign)];
        $result = correctAnswerGame($firstNumber, $secondNumber, $randOperator);
        return [
            'question' => "{$firstNumber} {$randOperator} {$secondNumber}",
            'correctAnswer' => $result
        ];
    };
    runGame($callback, $rule);
}

function correctAnswerGame($firstNumber, $secondNumber, $randOperator)
{
    switch ($randOperator) {
        case '+':
            return $firstNumber + $secondNumber;
        case '-':
            return $firstNumber - $secondNumber;
        case '*':
            return $firstNumber * $secondNumber;
        default:
            return null;
    }
}
