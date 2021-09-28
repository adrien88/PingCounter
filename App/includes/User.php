<?php

namespace App;

class User
{
    function __construct(string $pseudo = 'guest')
    {
        $_SESSION['pseudo'] = $pseudo;
    }
}
