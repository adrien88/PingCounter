<?php

namespace App\game;

class Sets
{
    function __construct(Scoring &$scoring, array &$players)
    {
        $this->players = $players;
        $this->scoring = $scoring;
    }

    /**
     * Play a set
     */
    function playSet()
    {
        do {
            foreach ($this->players as $player) {
                if ($player->play()) {
                    $this->scoring->increment($player->name);
                }
            }
        } while (!$this->scoring->isEnding());
        return $this->scoring->getScore();
    }
}
