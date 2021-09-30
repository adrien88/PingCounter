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
    private playersList $players;

    /**
     * 
     */
    function __construct(playersList $players)
    {
        $this->players = $players;
    }

    /**
     * 
     */
    function make(string $name, array $params): ?object
    {
        $call = 'App\game\\' . $name;
        if (class_exists($call, true))
            return new $call(...$params);
        else
            throw new Exception("Class not found : $name.");
    }

    /**
     * Create a new set if match are not done.
     */
    function newSet(): ?Set
    {
        if (!$this->isClosed()) {
            $scoring = $this->make('Scoring', [$this->players, 11, 2]);
            if (null !== $scoring) {
                $set = $this->make('Set', [$this->players, $scoring]);
                $this->playedSets[] = $set;
            }
            return end($this->playedSets);
        }
    }


    /**
     * test if all sets are done.
     */
    function isClosed(): bool
    {
        return (count($this->playedSets) >= $this->setsPerMatches);
    }
}
