<?php

namespace App\game;


class Scoring
{
    private array $scoring = [];

    /**
     * @param array $players List of players
     *      > like : [ "foo", "bar", "joe",.. ]
     */
    function __construct(
        private array $players,
        private int $goal = 11,
        private int $diff = 2,
    ) {
        foreach ($players as $player)
            $this->scoring[$player->name] = 0;
    }

    /**
     * Increment player
     */
    function increment(string $player)
    {
        if (isset($this->scoring[$player])) {
            $this->scoring[$player]++;
        }
    }

    /**
     * Test if 
     */
    function isEnding(): bool
    {
        if (11 <= max($this->scoring)) {
            sort($this->scoring);
            if (2 > ($this->scoring[0] - $this->scoring[1])) {
                return false;
            }
        }
        return true;
    }

    function __toString()
    {
        sort($this->scoring);
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
