<?php

namespace Php\Project\Games\Even;

use function cli\line;
use function cli\prompt;
use function Php\Project\Engine\runGame;

use const Php\Project\Engine\RANDOM_MINIMUM_NUMBER;
use const Php\Project\Engine\RANDOM_MAXIMUM_NUMBER;

function runGameEven()
{
    $rule = 'Answer "yes" if the number is even, otherwise answer "no".';
    $callback = function () {
        $number = rand(RANDOM_MINIMUM_NUMBER, RANDOM_MAXIMUM_NUMBER);
        $result = isEven($number);
        $correctAnswerGame = correctAnswer($result);
        return [
            'question' => $number,
            'correctAnswer' => $correctAnswerGame
        ];
    };
    runGame($callback, $rule);
}

function isEven(int $number)
{
    return $number % 2 === 0;
}

function correctAnswer(bool $result)
{
    return $result === true ? 'yes' : 'no';
}
