<?php

use App\game\Matchs;
use App\game\Scoring;
use App\game\Set;

/**
 * Affichage 
 */
session_start();
// unset($_SESSION['matches']);



/**
 * load match
 */
if (isset($_SESSION['matches']) and !empty($_SESSION['matches']))
    [$match, $players] = array_pop($_SESSION['matches']);

if (isset($match)) {
    $set = $match->getCurrentSet();
}

if (!isset($_GET['page'])) {
    header('location:?page=newMatch');
    exit;
} else {
    $page = $_GET['page'];
}

switch ($page) {

    case 'newMatch':
        if (isset($_POST['player1']) && isset($_POST['player2'])) {
            $match = new Matchs();
            $players = [$_POST['player1'], $_POST['player2']];
            redirect('newSet');
        }
        break;

    case 'newSet':
        if (!$match->isClosed()) {
            if ('new' === $_GET['set']) {
                $score = new Scoring($players, 11, 2);
                $set = new Set($score);
                $match->addSet($set);
            }
        } else {
            redirect('scores');
        }
        break;

    case 'playing':
        $set = $match->getCurrentSet();
        $score = $set->getScore();
        if (isset($_GET['player'])) {
            if (!$set->isClosed()) {
                $score->increment($_GET['player']);
            } else {
                redirect('newSet');
            }
        }
        break;

    case 'scores':
        break;
}

/**
 * save statement match
 */
$_SESSION['matches'][] = [$match, $players];


/**
 * 
 */
function redirect(string $page)
{
    header('location:?page=' . $page);
    exit;
}

/**
 * Rendering function.
 */
function getPage()
{
    if (file_exists('App/src/includes/views/' . $_GET['page'] . '.php'))
        return include 'App/src/includes/views/' . $_GET['page'] . '.php';
    else
        return "page not found";
}
