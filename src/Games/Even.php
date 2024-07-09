<?php

namespace Php\Project\Games\Even;

use function cli\line;
use function cli\prompt;

function greeting()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $finishGame = 3;
    for ($i = 0; $i < $finishGame; $i++) {
        $question = rand(0,100);
        line("Question: %s", $question);
        $answer = prompt('Your answer');
        if ($question % 2 === 0 && $answer === 'yes') {
            line('Correct!');
        } elseif ($question % 2 != 0 && $answer === 'no') {
            line('Correct!');
        } elseif ($question % 2 != 0 && $answer === 'yes') {
            line("'yes' is wrong answer ;(. Correct answer 'no'.");
            line("Let's try again, %s!", $name);
            return false;
        } else {
            line("'no' is wrong answer ;(. Correct answer 'yes'.");
            line("Let's try again, %s!", $name);
            return false;
        }
    };
    line("Congratulations, %s!", $name);
}
