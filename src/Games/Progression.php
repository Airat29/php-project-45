<?php

namespace Php\Project\Games\Progression;

use function cli\line;
use function cli\prompt;
use function Php\Project\Engine\runGame;

use const Php\Project\Engine\RANDOM_MINIMUM_NUMBER;
use const Php\Project\Engine\RANDOM_MAXIMUM_NUMBER;

function runGameProgression()
{
    $rule = 'What number is missing in the progression?';
    $callback = function () {
        $firstNumber = rand(RANDOM_MINIMUM_NUMBER, RANDOM_MAXIMUM_NUMBER);
        $step = rand(RANDOM_MINIMUM_NUMBER, RANDOM_MAXIMUM_NUMBER);
        $howManySteps = rand(5, 10);
        $endMassiv = $firstNumber + $howManySteps * $step;
        $firstMassiv = range($firstNumber, $endMassiv, $step);
        $randKey = array_rand($firstMassiv);
        $hidenElem = [$randKey => '..'];
        $massivDone = array_replace($firstMassiv, $hidenElem);
        $massivQuestion = implode(' ', $massivDone);
        $true = array_diff($firstMassiv, $massivDone);
        $trueAnswer = (int) implode(' ', $true);
        return [
            'question' => $massivQuestion,
            'correctAnswer' => $trueAnswer
        ];
    };
    runGame($callback, $rule);
}
