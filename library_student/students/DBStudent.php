<?php
include_once '../DBConnect.php';
include_once 'Student.php';

class DBStudent
{
    public $conn;

    public function __construct()
    {
        $db = new DBConnect();
        $this->conn = $db->connect();
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM `students`';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetchAll();
        $arr = [];

        foreach ($data as $item) {
            $student = new Student($item['name'], $item['phone'], $item['address']);
            $student->id = $item['id'];
            array_push($arr, $student);
        }
        return $arr;
    }

    public function create($obj)
    {
        $name = $obj->getName();
        $phone = $obj->getPhone();
        $address = $obj->getAddress();
        $sql = "INSERT INTO students(`name`,`phone`,`address`)VALUE ('$name','$phone','$address')";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function del($id)
    {
        $sql = "DELETE FROM `students` WHERE `id`='$id'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function update($name, $phone, $address, $id)
    {
        $sql = "UPDATE `students` SET `name` ='$name',`address`='$address',`phone`='$phone' WHERE `id`='$id'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM students WHERE id='$id'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetch();
        if ($data) {
            $student = new Student($data['name'], $data['phone'], $data['address']);
            $student->id = $data['id'];
            return $student;
        } else {
            return 'Id không tồn tại.';
        }
    }


}




