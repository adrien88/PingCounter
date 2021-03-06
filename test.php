<?php

use App\game\Matchs;
use App\game\Scoring;

require_once('vendor/autoload.php');
ini_set('display_errors', '1');


$players = ['Adrien', 'Saïd'];
$match = new Matchs(3);
do {
    $score = new Scoring($players, 11, 2);
    do {
        $score->increment($players[rand(0, 1)]);
    } while (!$score->isClosed());
    $match->playset($score);
    //
} while (!$match->isClosed());

foreach ($match->getSets() as $test)
    echo $test;
