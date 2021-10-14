<?php

class SpyCollection
{
    public $spy = [];
    private $sata = [];

    function set(stdClass $obj): bool
    {
        if (isset($obj->name)) {
            $this->spy[] = "adding $obj->name.\n";
            $this->data[] = $obj;
            return true;
        }
        return false;
    }

    function get(string $name): null|stdClass
    {
        foreach ($this->data as $obj)
            if ($name === $obj->name) {
                $this->spy[] = "getting $obj->name.\n";
                return $obj;
            }
        return null;
    }
}
