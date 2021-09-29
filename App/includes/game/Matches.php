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
    function getPlayer(string $name): ?string
    {
        foreach ($this->players as $player)
            if ($name === $player->name)
                return $player;
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
    function newSet(): ?Sets
    {
        if (!$this->isClosed()) {
            $scoring = $this->make('Scoring', [$this->players, 11, 2]);
            if (null !== $scoring)
                $this->playedSets[] = $this->make('Sets', [$scoring, $this->players]);
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
