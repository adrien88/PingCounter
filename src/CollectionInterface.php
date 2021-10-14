<?php

interface CollectionInterface
{
    function set(stdClass $obj): bool;
    function get(string $name): null|stdClass;
}
