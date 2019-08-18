<?php

class Student
{
    public $id;
    public $name;
    public $phone;
    public $address;

    public function __construct($name,$phone,$address)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->address = $address;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getAddress()
    {
        return $this->address;
    }
}
