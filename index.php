<?php

ini_set('display_errors', '1');
require_once('vendor/autoload.php');
include_once 'App/src/includes/main.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="App/src/assets/css/style.css">

    <title>PingCounter</title>

    <!-- <script type="module" defer>
        import {
            Game
        } from "./App/src/assets/js/Game.js";
        customElements.define('tenis-game', Game, {});
        document.body.appendChild(new Game);
    </script> -->

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
            <div id="playerLeft" class="left">
                <div id=""><?= $score->getScore($players[0]) ?> </div>
                <a href="?page=playing&player=<?= $players[0] ?>"><?= $players[0] ?></a>
            </div>
            <div id="playerRight" class="right">
                <div id=""><?= $score->getScore($players[1]) ?></div>
                <a href="?page=playing&player=<?= $players[1] ?>"><?= $players[1] ?></a>
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