<div>
    <?= (isset($match)) ?  $match->getKeyCurrentSet() : 0; ?>
</div>
<div id="playerLeft" class="left">
    <div id=""><?= (isset($score)) ? $score->getScore($players[0]) : 0 ?> </div>
    <a href="?page=playing&player=<?= $players[0] ?>"><?= $players[0] ?></a>
</div>
<div id="playerRight" class="right">
    <div id=""><?= (isset($score)) ? $score->getScore($players[0]) : 0 ?></div>
    <a href="?page=playing&player=<?= $players[1] ?>"><?= $players[1] ?></a>
</div>