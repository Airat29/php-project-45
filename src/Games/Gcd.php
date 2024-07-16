<?php

namespace Php\Project\Games\Gcd;

use function cli\line;
use function cli\prompt;
use function Php\Project\Engine\correctAnswer;
use function Php\Project\Engine\greeting;
use function Php\Project\Engine\getAnswer;
use function Php\Project\Engine\finishGame;

function games()
{
    $start = greeting();
    line('Find the greatest common divisor of given numbers.');
    $howRounds = 3;
    for ($i = 0; $i < $howRounds; $i++) {
        $firstNumber = rand(1, 20);
        $secondNumber = rand(1, 20);
        $firstMassiv = range(1, $firstNumber);
        $secondMassiv = range(1, $secondNumber);
        $gcdMassiv = [];
        line("Question: {$firstNumber} {$secondNumber}");
        $personAnswer = getAnswer();
        foreach ($firstMassiv as $numbers) {
            if ($firstNumber % $numbers === 0 && $secondNumber % $numbers === 0) {
                $gcdMassiv[] = $numbers;
            };
        };
        $trueAnswer = max($gcdMassiv);
        if ($personAnswer == $trueAnswer) {
            correctAnswer();
        } else {
            line("'$personAnswer' is wrong answer ;(. Correct answer was '$trueAnswer'.");
            line("Let's try again, %s!", $start);
            return false;
        };
    }
    finishGame($start);
}
