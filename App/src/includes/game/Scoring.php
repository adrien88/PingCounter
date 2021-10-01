<?php

namespace App\game;

class Scoring
{
    /**
     * @param array $scoring
     */
    private array $scoring = [];

    /**
     * @param array $players List of players
     *      > like : [ "foo", "bar", "joe",.. ]
     */
    function __construct(
        array $players,
        private int $goal = 11,
        private int $diff = 1,
    ) {
        foreach ($players as $player)
            $this->scoring[$player] = 0;
    }

    /**
     * Increment player.
     */
    function increment(string $player)
    {
        if (isset($this->scoring[$player]))
            $this->scoring[$player]++;
        asort($this->scoring);
    }

    /**
     * Try to close
     */
    function isClosed(): bool
    {
        $keys = array_keys($this->scoring);
        if (
            $this->goal <= $this->scoring[$keys[0]]
            && $this->diff < abs($this->scoring[$keys[0]] - $this->scoring[$keys[1]])
        ) {
            return true;
        }
        return false;
    }

    /**
     * toString()
     */
    function __toString()
    {
        asort($this->scoring);
        $str = '<ul>';
        foreach ($this->scoring as $player => $count)
            $str .= "<li>$player => $count</li>";
        return $str . '</ul>';
    }

    /**
     * 
     */
    function getScore()
    {
        return $this->scoring;
    }

    /**
     * 
     */
    function getLeader()
    {
        return array_shift(array_keys($this->scoring[0]));
    }
}
