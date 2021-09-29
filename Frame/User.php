<?php

namespace Frame;

class User
{
    function __construct(string $pseudo = 'guest')
    {
        $_SESSION['pseudo'] = $pseudo;
    }
}
