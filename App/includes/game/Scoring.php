<?php

namespace App\game;


class Scoring
{
    private array $scoring = [];

    /**
     * @param array $players List of players
     *      > like : [ "foo", "bar", "joe",.. ]
     */
    function __construct(array $players)
    {
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
        return $this->testEnding();
    }

    /**
     * 
     */
    function testEnding()
    {
        $max = max($this->scoring);
        if (11 <= $max) {
            sort($this->scoring);
            if (2 > ($this->scoring[0] - $this->scoring[1])) {
                array_keys($this->scoring[0]);
            }
        }
    }
}
