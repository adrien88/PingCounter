<?php

namespace App\game;

use Exception;

/**
 * Describe a matche.
 */
class Matchs
{
    private int $setsPerMatches = 3;
    private array $playedSets = [];

    /**
     * 
     */
    function __construct(
        int $sets = 3
    ) {
        $this->setsPerMatches = $sets;
    }

    /**
     * 
     */
    function getSets()
    {
        return $this->playedSets;
    }

    /**
     * Do action
     */
    function playSet(Scoring $score)
    {
        if (!$this->isClosed())
            $this->playedSets[] = $score;
    }

    /**
     * test if all sets are done.
     */
    function isClosed(): bool
    {
        return (count($this->playedSets) >= $this->setsPerMatches);
    }
}
