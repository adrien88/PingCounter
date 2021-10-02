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
     * 
     */
    function getScore(?string $player = null)
    {
        if (isset($player) && isset($this->scoring[$player]))
            return $this->scoring[$player];
        else
            return $this->scoring;
    }


    /**
     * Increment player.
     */
    function increment(string $player)
    {
        if (isset($this->scoring[$player]))
            $this->scoring[$player]++;
    }

    /**
     * Try to close
     */
    function isClosed(): bool
    {
        arsort($this->scoring);
        [$first, $second] = array_keys($this->scoring);
        $keys = array_keys($this->scoring);
        if (
            $this->goal <= $this->scoring[$first]
            && $this->diff <= abs($this->scoring[$first] - $this->scoring[$second])
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
        $str = 'SET : <ul>';
        foreach ($this->scoring as $player => $count)
            $str .= "<li>$player => $count</li>";
        return $str . '</ul>';
    }
}
