<?php

use App\game\Matches;
use App\game\Player;
use Frame\AutoloaderPSR4;

ini_set('display_errors', '1');
session_start();

include_once 'Frame/AutoloaderPSR4.php';
new AutoloaderPSR4;
// new Router;

// $_SESSION['matches'] = [];

$adrien = new Player('Adrien');
$jojo = new Player('Jojo');
$match = new Matches([$adrien, $jojo]);
while (!$match->isClosed()) {
    $set = $match->newSet();
    if (null != $set) {
        $score = $set->playSet();
    }
}
echo 'Vaiqueur : ';

var_dump($match);
