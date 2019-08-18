<?php

class Category
{
    public $id;
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    function getId()
    {
        return $this->id;
    }

    function getName()
    {
        return $this->name;
    }
}