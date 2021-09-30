<?php

namespace App\game;

use Iterator;
use LogicException;

/**
 * Describe a player list. 
 */
class PlayersList implements Iterator
{
    /**
     * @param array $users
     * @param int $maxl
     */
    function __construct(
        private array $users = [],
        private int $maxlenght = -1,
    ) {
    }

    /**
     * Add a player.
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
     * Get a player (if exists)
     */
    function get(string $name): ?Player
    {
        if (array_key_exists($name, $this->users))
            return $this->users[$name];
    }

    /**
     * Call function on each player.
     */
    function map($callable)
    {
        foreach ($this->users as $player)
            $callable($player);
    }

    /**
     * ---------
     *      ITERATOR FUNCTION
     * ---------
     */

    public function rewind()
    {
        $this->position = 0;
    }

    public function current()
    {
        if (isset(array_keys($this->users)[$this->position])) {
            $key = array_keys($this->users)[$this->position];
            return $this->users[$key];
        }
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        ++$this->position;
    }

    public function valid()
    {
        return isset(array_keys($this->users)[$this->position]);
    }
}
