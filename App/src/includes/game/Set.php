<?php

namespace App\game;

class Set
{
    /**
     * 
     */
    function __construct(
        private Scoring &$scoring
    ) {
    }

    /**
     * Get score object
     */
    function getScore(): Scoring
    {
        return $this->scoring;
    }

    /**
     * Set is closed if score is closed
     */
    function isClosed()
    {
        return $this->scoring->isClosed();
    }
}
