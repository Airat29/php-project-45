<?php

namespace Php\Project\Games\Even;

use function cli\line;
use function cli\prompt;
use function Php\Project\Engine\askQuestionBool;
use function Php\Project\Engine\greeting;
use function Php\Project\Engine\getAnswer;
use function Php\Project\Engine\finishGame;

function games()
{
    $name = greeting();
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $finishGame = 3;
    for ($i = 0; $i < $finishGame; $i++) {
        $question = askQuestionBool();
        $personAnswer = getAnswer();
        if ($question % 2 === 0 && $personAnswer === 'yes') {
            line('Correct!');
        } elseif ($question % 2 != 0 && $personAnswer === 'no') {
            line('Correct!');
        } elseif ($question % 2 != 0 && $personAnswer === 'yes') {
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
