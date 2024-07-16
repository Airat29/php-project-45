<?php

namespace Php\Project\Games\Even;

use function cli\line;
use function cli\prompt;
use function Php\Project\Engine\correctAnswer;
use function Php\Project\Engine\greeting;
use function Php\Project\Engine\getAnswer;
use function Php\Project\Engine\finishGame;

function games()
{
    $start = greeting();
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $finishGame = 3;
    for ($i = 0; $i < $finishGame; $i++) {
        $question = rand(0, 100);
        line("Question: %s", $question);
        $answer = getAnswer();
        if ($question % 2 === 0 && $answer === 'yes') {
            correctAnswer();
        } elseif ($question % 2 != 0 && $answer === 'no') {
            correctAnswer();
        } elseif ($question % 2 != 0 && $answer === 'yes') {
            line("'$answer' is wrong answer ;(. Correct answer 'no'.");
            line("Let's try again, %s!", $start);
            return false;
        } else {
            line("'$answer' is wrong answer ;(. Correct answer 'yes'.");
            line("Let's try again, %s!", $start);
            return false;
        }
    };
    finishGame($start);
}
