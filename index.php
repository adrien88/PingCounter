<?php

use App\game\Matches;
use App\game\Player;


ini_set('display_errors', '1');
session_start();

include_once 'vendor/autoload.php';

// $_SESSION['matches'] = [];

$players = [new Player('Adrien'), new Player('Saïd')];
$match = new Matches($players);
while (!$match->isClosed()) {
    $set = $match->newSet();
    if (null != $set) {
        $score = $set->playSet();
    }
}
echo 'Vainqueur : ';

var_dump($match);
