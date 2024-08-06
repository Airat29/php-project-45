<?php

namespace Php\Project\Engine;

use function cli\line;
use function cli\prompt;

const RANDOM_MINIMUM_NUMBER = 1;
const RANDOM_MAXIMUM_NUMBER = 10;

function runGame(callable $callback, $firstname)
{
    $name = greeting($firstname);

    $howRounds = 3;
    $howcorrectAnswers = 0;
    for ($i = 0; $i < $howRounds; $i++) {
        $data = $callback();
        $question = $data['question'];
        $trueAnswer = $data['correctAnswer'];

        line("Question: %s", $question);
        $answer = prompt('Your answer');

        if ($answer == $trueAnswer) {
            $howcorrectAnswers += 1;
            line('Correct!');
        } else {
            line("'$answer' is wrong answer ;(. Correct answer was '$trueAnswer'.");
            line("Let's try again, %s!", $name);
            return;
        }
    }

    line("Congratulations, %s!", $name);
}

function greeting($firstname)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($firstname);
    return $name;
}
