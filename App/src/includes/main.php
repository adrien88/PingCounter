<?php

use App\game\Matchs;
use App\game\Scoring;

/**
 * Affichage 
 */
session_start();

/**
 * load match
 */
if (isset($_SESSION['matches']) and !empty($_SESSION['matches'])) {
    [$match, $score, $players] = end($_SESSION['matches']);
}

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
