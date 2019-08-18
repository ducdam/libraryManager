<?php
include_once '../DBConnect.php';
include_once 'Book.php';

class DBBook
{
    public $conn;

    public function __construct()
    {
        $db = new DBConnect();
        $this->conn = $db->connect();
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM books';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetchAll();
        $arr = [];
        foreach ($data as $item) {
            $book = new Book($item['name'], $item['author'], $item['publish'], $item['publisher'], $item['categoryId']);
            $book->id = $item['id'];
            array_push($arr, $book);
        }
        return $arr;
    }

    public function creat($obj)
    {
        $name = $obj->getName();
        $author = $obj->getAuthor();
        $publish = $obj->getPublish();
        $publisher = $obj->getPublisher();
        $categoryId = $obj->getCategoryId();
        $sql = "INSERT INTO `books`(`name`, `author`, `categoryId`, `publish`, `publisher`) VALUES ('$name','$author','$categoryId','$publish','$publisher')";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function del($id)
    {
        $sql = "DELETE FROM `books` WHERE id='$id'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function update($id, $name, $author, $categoryId, $publish, $publisher)
    {
        $sql = "UPDATE `books` SET `name`='$name',`author`='$author',`categoryId`='$categoryId',`publish`='$publish',`publisher`='$publisher' WHERE id='$id'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM books WHERE id='$id'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetch();
        if ($data) {
            $book = new Book($data['name'], $data['author'], $data['publish'], $data['publisher'], $data['categoryId']);
            $book->id = $data['id'];
            return $book;
        }else{
            return "Id không tồn tại";
        }
    }
}