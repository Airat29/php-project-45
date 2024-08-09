<?php

namespace Php\Project\Games\Progression;

use function cli\line;
use function cli\prompt;
use function Php\Project\Engine\runGame;

use const Php\Project\Engine\RANDOM_MINIMUM_NUMBER;
use const Php\Project\Engine\RANDOM_MAXIMUM_NUMBER;

const RULE_OF_THE_GAME = 'What number is missing in the progression?';

function runGameProgression()
{
    $rule = RULE_OF_THE_GAME;
    $callback = function () {
        $firstNumber = rand(RANDOM_MINIMUM_NUMBER, RANDOM_MAXIMUM_NUMBER);
        $step = rand(RANDOM_MINIMUM_NUMBER, RANDOM_MAXIMUM_NUMBER);
        $howManySteps = rand(5, 10);
        $endOfNumbers = $firstNumber + $howManySteps * $step;
        $fullQuestion = range($firstNumber, $endOfNumbers, $step);
        $randKey = array_rand($fullQuestion);
        $hidenElem = [$randKey => '..'];
        $questionWithHidenElement = array_replace($fullQuestion, $hidenElem);
        $massivQuestion = implode(' ', $questionWithHidenElement);
        $true = array_diff($fullQuestion, $questionWithHidenElement);
        $trueAnswer = (int) implode(' ', $true);
        return [
            'question' => $massivQuestion,
            'correctAnswer' => $trueAnswer
        ];
    };
    runGame($callback, $rule);
}
