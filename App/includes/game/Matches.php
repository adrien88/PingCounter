<?php

namespace App\game;

class Matches
{
    private int $setsPerMatches = 3;
    private array $playedSets = [];
    private array $players;

    function addPlayer(string $name)
    {
        $this->players[] = new Player($name);
    }

    function newSet()
    {
        $scoring = new Scoring($this->players);
        $sets = new Sets($scoring);
        $n = count($this->playedSets);
        $this->currentSet = $n;
        if ($n <= $this->setsPerMatches)
            $this->sets[$n] = $sets;
    }
}
