<?php

namespace App\game;

use Exception;

class Matches
{
    private int $setsPerMatches = 3;
    private array $playedSets = [];
    private array $players = [];

    /**
     * 
     */
    function __construct(array $players)
    {
        foreach ($players as $player)
            if (2 >= count($this->players))
                $this->players[] = $player;
            else
                throw new Exception('On ne peut jouer qu\'a deux.');
    }

    /**
     * 
     */
    function make(string $name, array $params): ?object
    {
        if (class_exists($name, true)) {
            return new $name(...$params);
        }
    }

    /**
     * Create a new set if match are not done.
     */
    function newSet(): ?Sets
    {
        if (!$this->isClosed()) {
            $scoring = $this->make('App\game\Scoring', [$this->players]);
            if (null !== $scoring)
                $this->playedSets[] = $this->make('App\game\Sets', [$scoring, $this->players]);
            return end($this->playedSets);
        }
    }

    /**
     * test if all sets are done.
     */
    function isClosed(): bool
    {
        return (count($this->playedSets) <= $this->setsPerMatches);
    }
}
