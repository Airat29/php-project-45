<?php

namespace Php\Project\Games\Prime;

use function cli\line;
use function cli\prompt;
use function Php\Project\Engine\greeting;
use function Php\Project\Engine\getAnswer;
use function Php\Project\Engine\finishGame;
use function Php\Project\Engine\askQuestionBool;

function games()
{
    $name = greeting();
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    $finishGame = 3;
    for ($i = 0; $i < $finishGame; $i++) {
        $question = askQuestionBool();
        $personAnswer = getAnswer();
        $trueAnswer = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97];
        if (in_array($question, $trueAnswer, true) && $personAnswer === 'yes') {
            line('Correct!');
        } elseif (!in_array($question, $trueAnswer, true) && $personAnswer === 'no') {
            line('Correct!');
        } elseif (!in_array($question, $trueAnswer, true) && $personAnswer === 'yes') {
            line("'$personAnswer' is wrong answer ;(. Correct answer 'no'.");
            line("Let's try again, %s!", $name);
            return false;
        } else {
            line("'$personAnswer' is wrong answer ;(. Correct answer 'yes'.");
            line("Let's try again, %s!", $name);
            return false;
        }
    };
    finishGame($name);
}
