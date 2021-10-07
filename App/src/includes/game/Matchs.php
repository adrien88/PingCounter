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
     * New match
     */
    function __construct(
        int $sets = 3
    ) {
        $this->setsPerMatches = $sets;
    }

    /**
     * Get all sets
     */
    function getSets()
    {
        return $this->playedSets;
    }

    /**
     * get a new set
     */
    function addSet(Set &$set)
    {
        if (!$this->isClosed())
            $this->playedSets[] = $set;
    }

    /**
     * get the current set
     */
    function getCurrentSet(): null|Set
    {
        if (!empty($this->playedSets))
            return end($this->playedSets);
        return null;
    }

    /**
     * get the current key set
     */
    function getKeyCurrentSet(): int
    {
        return (count($this->playedSets) + 1);
    }

    /**
     * test if all sets are done.
     */
    function isClosed(): bool
    {
        return (count($this->playedSets) >= $this->setsPerMatches && $this->getCurrentSet()->isClosed());
    }
}
