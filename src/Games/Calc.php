<?php

namespace Php\Project\Games\Calc;

use function cli\line;
use function cli\prompt;
use function Php\Project\Engine\checkingTheAnswer;
use function Php\Project\Engine\greeting;
use function Php\Project\Engine\getAnswer;
use function Php\Project\Engine\finishGame;

function games()
{
    $name = greeting();
    $howRounds = 3;
    line('What is the result of the expression?');
    for ($i = 0; $i < $howRounds; $i++) {
        $number1 = rand(0, 20);
        $number2 = rand(0, 20);
        $sign = ['+', '-', '*'];
        $operation = $sign[array_rand($sign)];
        $question = $number1 . $operation . $number2;
        $trueAnswer = eval("return $question;");
        line("Question: %s %s %s", $number1, $operation, $number2);
        $personAnswer = getAnswer();
        checkingTheAnswer($personAnswer, $trueAnswer, $name);
    }
    finishGame($name);
}
