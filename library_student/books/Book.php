<?php


class Book
{
    public $id;
    public $name;
    public $author;
    public $publish;
    public $publisher;
    public $categoryId;

    public function __construct($name, $author, $publish, $publisher, $categoryId)
    {
        $this->name = $name;
        $this->author = $author;
        $this->publish = $publish;
        $this->publisher = $publisher;
        $this->categoryId = $categoryId;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getPublish()
    {
        return $this->publish;
    }

    public function getPublisher()
    {
        return $this->publisher;
    }

    public function getCategoryId()
    {
        return $this->categoryId;
    }
}
