<?php

namespace App\game;

/**
 * Describe a single player. 
 */
class Player
{

    /**
     * @var string $name (read-only) 
     */
    private string $name;

    /**
     * @var string $name
     */
    function __construct(
        $name = 'Guest'
    ) {
        $this->name = $name;
    }

    /**
     * Display name as read-only.
     */
    function __get(string $propertie)
    {
        if ('name' === $propertie)
            return $this->name;
    }

    /**
     * 
     */
    function randPlay(): bool
    {
        return (1 === rand(0, 1));
    }
}
