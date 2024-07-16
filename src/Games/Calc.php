<?php

namespace Php\Project\Games\Calc;

use function cli\line;
use function cli\prompt;
use function Php\Project\Engine\correctAnswer;
use function Php\Project\Engine\greeting;
use function Php\Project\Engine\getAnswer;
use function Php\Project\Engine\finishGame;

function games()
{
    $start = greeting();
    $howRounds = 3;
    line('What is the result of the expression?');
    for ($i = 0; $i < $howRounds; $i++) {
        $firstNumber = rand(0, 20);
        $secondNumber = rand(0, 20);
        $sign = ['+', '-', '*'];
        $randSign = $sign[array_rand($sign)];
        $question = $firstNumber . $randSign . $secondNumber;
        $trueAnswer = eval("return $question;");
        line("Question: %s", $question);
        $personAnswer = getAnswer();
        if ($personAnswer == $trueAnswer) {
            correctAnswer();
        } else {
            line("'$personAnswer' is wrong answer ;(. Correct answer was '$trueAnswer'.");
            line("Let's try again, %s!", $start);
            return false;
        }
    }
    finishGame($start);
}
