<?php

namespace App\game;

class Player
{

    /**
     * 
     */
    function __construct(
        public $name = 'Guest'
    ) {
        $this->name = $name;
    }

    /**
     * 
     */
    function play(): bool
    {
        return (1 == rand(0, 1)) ? true : false;
    }
}
