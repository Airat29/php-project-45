<?php

namespace Php\Project\Games\Even;

use function cli\line;
use function cli\prompt;
use function Php\Project\Engine\greeting;
use function Php\Project\Engine\getAnswer;

function games()
{
    $start = greeting();
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $finishGame = 3;
    for ($i = 0; $i < $finishGame; $i++) {
        $question = rand(0,100);
        line("Question: %s", $question);
        $answer = getAnswer();
        if ($question % 2 === 0 && $answer === 'yes') {
            line('Correct!');
        } elseif ($question % 2 != 0 && $answer === 'no') {
            line('Correct!');
        } elseif ($question % 2 != 0 && $answer === 'yes') {
            line("'yes' is wrong answer ;(. Correct answer 'no'.");
            line("Let's try again, %s!", $start);
            return false;
        } else {
            line("'no' is wrong answer ;(. Correct answer 'yes'.");
            line("Let's try again, %s!", $start);
            return false;
        }
    };
    line("Congratulations, %s!", $start);
}
