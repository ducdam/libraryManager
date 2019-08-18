<?php
include_once '../DBConnect.php';
include_once 'Category.php';

class DBCategory
{
    public $conn;

    public function __construct()
    {
        $db = new DBConnect();
        $this->conn = $db->connect();
    }

    public function getAll()
    {
        $sql = " SELECT * FROM category ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetchAll();
        $array = [];
        foreach ($data as $item) {
            $category = new Category($item['name']);
            $category->id = $item['id'];
            array_push($array, $category);
        }
        return $array;
    }

    public function creat($obj)
    {
        $name = $obj->getName();
        $sql = "INSERT INTO `category`(`name`) VALUES ('$name')";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function del($id)
    {
        $sql = "DELETE FROM `category` WHERE id='$id'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function update($id, $name)
    {
        $sql = "UPDATE `category` SET `name`='$name' WHERE id='$id'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM `category` WHERE id='$id'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetch();
        if ($data) {
            $category = new Category($data['name']);
            $category->id = $data['id'];
            return $category;
        }else{
            return "Id không tồn tại";
        }
    }
}

