<?php

namespace App\game;

use LogicException;

/**
 * Describe a single player. 
 */
class PlayersList
{
    function __construct(
        private array $users = [],
        private int $maxlenght = -1,
    ) {
    }

    /**
     * 
     */
    function add(Player $player)
    {
        if (!array_key_exists($player->name, $this->users))
            if ($this->maxlenght <= 0 xor count($this->users) < $this->maxlenght)
                $this->users[$player->name] = $player;
            else
                throw new LogicException('Only  ' . $this->maxlenght . ' users allowed.');
        else
            throw new LogicException('Two users can\'t get the same name.');
    }

    /**
     * 
     */
    function get(string $name): ?Player
    {
        if (array_key_exists($name, $this->users))
            return $this->users[$name];
    }

    /**
     * 
     */
    function map($callable)
    {
        foreach ($this->users as $player)
            $callable($player);
    }
}
