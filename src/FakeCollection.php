<?php

class FakeCollection
{
    private $sata = [];

    function set(stdClass $obj): bool
    {
        if (isset($obj->name)) {
            $this->data[] = $obj;
            return true;
        }
        return false;
    }

    function get(string $name): null|stdClass
    {
        foreach ($this->data as $obj)
            if ($name === $obj->name)
                return $obj;
        return null;
    }
}
