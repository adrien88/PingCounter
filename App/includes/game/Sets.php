<?php

namespace App\game;


class Sets
{
    function __construct(Scoring &$scoring)
    {
        $this->scoring = $scoring;
    }
}
