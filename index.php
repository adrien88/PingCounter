<?php

use App\game\Matchs;
use App\game\Scoring;

require_once('vendor/autoload.php');
ini_set('display_errors', '1');

// $players = ['Adrien', 'Saïd'];
// $match = new Matchs(3);
// do {
//     $score = new Scoring($players, 11, 2);
//     do {
//         $score->increment($players[rand(0, 1)]);
//     } while (!$score->isClosed());
//     $match->playset($score);
//     //
// } while (!$match->isClosed());

// foreach ($match->getSets() as $test)
//     echo $test;


/**
 * Affichage 
 */
session_start();

// unset($_SESSION['matches']);

/**
 * load match
 */
if (isset($_SESSION['matches']) and !empty($_SESSION['matches']))
    [$match, $score, $players] = end($_SESSION['matches']);


$page = (isset($_GET['page'])) ? $_GET['page'] : 'new';
switch ($page) {
    case 'new':
        if (isset($_POST['player1']) && isset($_POST['player1'])) {
            $match = new Matchs(3);
            $players = [$_POST['player1'], $_POST['player2']];
            $score = new Scoring($players, 11, 2);
            $page = 'playing';
        }
        break;

    case 'playing':
        if (isset($_GET['player'])) {
            if (!$match->isClosed()) {
                if (!$score->isClosed()) {
                    $score->increment($_GET['player']);
                } else {
                    $match->playset($score);
                    $score = new Scoring($players, 11, 2);
                }
            } else {
                $page = 'scores';
            }
        }
        break;

    case 'scores':
        break;
}

/**
 * save statement match
 */
if (isset($match) && isset($score) && isset($players))
    $_SESSION['matches'][] = [$match, $score, $players];


// $page = 'playing';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="App/src/assets/css/style.css">
    <title>PingCounter</title>
</head>

<body>

    <!-- start template -->
    <div class="table">

        <!-- Get new page -->
        <?php if ('new' == $page) : ?>
            <div class="left">
                <p>Créer une nouvelle partie.</p>
            </div>
            <div class="right">
                <form action="" method="post">
                    <ul>
                        <li>
                            <input type="text" name="player1" placeholder="Player 1" required>
                        </li>
                        <li>
                            <input type="text" name="player2" placeholder="Player 2" required>
                        </li>
                        <li>
                            <input type="submit" value="Go !">
                        </li>
                    </ul>
                </form>
            </div>
        <?php endif ?>

        <!-- Playing -->
        <?php if ('playing' == $page) : ?>
            <div class="left">
                <div id="player1"><?= $score->getScore($players[0]) ?></div>
                <a class="button" href='?page=playing&player=<?= $players[0] ?>'><?= $players[0] ?></a>
            </div>
            <div class="right">
                <div id="player2"><?= $score->getScore($players[1]) ?></div>
                <a class="button" href='?page=playing&player=<?= $players[1] ?>'><?= $players[1] ?></a>
            </div>
        <?php endif ?>

        <!-- Scores -->
        <?php if ('scores' ==  $page) : ?>
            <div class="left">
                <h2>Scores</h2>
                <a href="?page=new">New match.</a>
            </div>
            <div class="right">
                <?php
                foreach ($match->getSets() as $set) {
                    echo (string) $set;
                }
                ?>
            </div>
        <?php endif ?>

    </div>
    <!-- end template -->



</body>

</html>