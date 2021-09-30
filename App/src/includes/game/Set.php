<?php

namespace App\game;

class Set
{
    /**
     * 
     */
    function __construct(
        private playersList &$players,
        private Scoring &$scoring
    ) {
    }

    /**
     * Play a set
     */
    function playSet($callable)
    {
        do {
            foreach ($this->players as $player) {
                if ($callable($player))
                    $this->scoring->increment($player->name);
            }
        } while (!$this->scoring->isClosed());
        return $this->scoring;
    }
}
