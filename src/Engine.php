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
