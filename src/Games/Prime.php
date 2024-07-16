<?php

namespace Php\Project\Games\Prime;

use function cli\line;
use function cli\prompt;
use function Php\Project\Engine\greeting;
use function Php\Project\Engine\getAnswer;

function games()
{
    $start = greeting();
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    $finishGame = 3;
    for ($i = 0; $i < $finishGame; $i++) {
        $question = rand(1, 100);
        line("Question: %s", $question);
        $answer = getAnswer();
        $trueAnswer = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97];
        if (in_array($question, $trueAnswer) && $answer === 'yes') {
            line('Correct!');
        } elseif (!in_array($question, $trueAnswer) && $answer === 'no') {
            line('Correct!');
        } elseif (!in_array($question, $trueAnswer) && $answer === 'yes') {
            line("'$answer' is wrong answer ;(. Correct answer 'no'.");
            line("Let's try again, %s!", $start);
            return false;
        } else {
            line("'$answer' is wrong answer ;(. Correct answer 'yes'.");
            line("Let's try again, %s!", $start);
            return false;
        }
    };
    line("Congratulations, %s!", $start);
}
