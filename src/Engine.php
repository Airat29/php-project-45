<?php

namespace Php\Project\Engine;

use function cli\line;
use function cli\prompt;

function greeting()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function getAnswer()
{
    $answer = prompt('Your answer');
    return $answer;
}

function finishGame(string $name): void
{
    line("Congratulations, %s!", $name);
}

function askQuestionBool()
{
    $question = rand(0, 100);
    line("Question: %s", $question);
    return $question;
}

function checkingTheAnswer($personAnswer, $trueAnswer, $name)
{
    if ($personAnswer == $trueAnswer) {
        line('Correct!');
    } else {
        line("'$personAnswer' is wrong answer ;(. Correct answer was '$trueAnswer'.");
        line("Let's try again, %s!", $name);
        return exit;
    };
}
