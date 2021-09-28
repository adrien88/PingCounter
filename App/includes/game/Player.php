<?php

namespace App\game;

class Player
{

    private static $list = [];

    static function getInstance(string $name)
    {
        return self::$list[$name];
    }

    function __construct(
        public $name = 'Guest'
    ) {
        if (!array_key_exists($this->name, self::$list)) {
            self::$list[$this->name] = $this;
        }
    }
}
