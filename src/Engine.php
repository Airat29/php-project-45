<?php

namespace Php\Project\Engine;

use function cli\line;
use function cli\prompt;

const RANDOM_MINIMUM_NUMBER = 1;
const RANDOM_MAXIMUM_NUMBER = 10;
const HOW_ROUNDS = 3;


function runGame(callable $callback, string $firstname)
{
    $name = greeting($firstname);

    for ($i = 0; $i < HOW_ROUNDS; $i++) {
        $data = $callback();
        $question = $data['question'];
        $trueAnswer = $data['correctAnswer'];

        line("Question: %s", $question);
        $answer = prompt('Your answer');

        if ($answer == $trueAnswer) {
            line('Correct!');
        } else {
            line("'$answer' is wrong answer ;(. Correct answer was '$trueAnswer'.");
            line("Let's try again, %s!", $name);
            return;
        }
    }

    line("Congratulations, %s!", $name);
}

function greeting(string $firstname)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($firstname);
    return $name;
}
