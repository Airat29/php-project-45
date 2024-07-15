<?php

namespace Php\Project\Games\Progression;

use function cli\line;
use function cli\prompt;
use function Php\Project\Engine\greeting;
use function Php\Project\Engine\getAnswer;

function games()
{
    $start = greeting();
    $howRounds = 3;
    line('What number is missing in the progression?');
    for ($i = 0; $i < $howRounds; $i++) {
        $firstNumber = rand(1,20);
        $step = rand(1,10);
        $howManySteps = rand(5,10);
        $endMassiv = $firstNumber + $howManySteps * $step;
        $firstMassiv = range($firstNumber, $endMassiv, $step);
        $randKey = array_rand($firstMassiv);
        $hidenElem = [$randKey => '..'];
        $massivDone = array_replace($firstMassiv, $hidenElem);
        $massivQuestion = implode(' ', $massivDone);
        line("Question: $massivQuestion");
        $true = array_diff($firstMassiv, $massivDone);
        echo $trueAnswer = implode(' ', $true);
        $personAnswer = getAnswer();
        if ($personAnswer === $trueAnswer) {
            line('Correct!');
        } else {
            line("'$personAnswer' is wrong answer ;(. Correct answer was '$trueAnswer'.");
            line("Let's try again, %s!", $start);
            return false;
        };
    }
    line("Congratulations, %s!", $start);
}