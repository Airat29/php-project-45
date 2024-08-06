<?php

namespace Php\Project\Games\Prime;

use function cli\line;
use function cli\prompt;
use function Php\Project\Engine\runGame;

use const Php\Project\Engine\RANDOM_MINIMUM_NUMBER;
use const Php\Project\Engine\RANDOM_MAXIMUM_NUMBER;

function runGamePrime()
{
    $rule = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $callback = function () {
        $number = rand(RANDOM_MINIMUM_NUMBER, RANDOM_MAXIMUM_NUMBER);
        $result = isPrime($number);
        $correctAnswerGame = correctAnswer($result);
        return [
            'question' => $number,
            'correctAnswer' => $correctAnswerGame
        ];
    };
    runGame($callback, $rule);
}

function isPrime($number)
{
    $primeNumbers = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37];
    return in_array($number, $primeNumbers, true);
}

function correctAnswer($result)
{
    return $result === true ? 'yes' : 'no';
}
