<?php
include_once '../DBConnect.php';
include_once 'Borrow.php';

class DbBorrow
{
    public $conn;

    public function __construct()
    {
        $db = new DBConnect();
        $this->conn = $db->connect();
    }

    public function getAll()
    {
        $sql = " SELECT * FROM borrowOrder ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetchAll();
        $array = [];
        foreach ($data as $item) {
            $borrow = new Borrow($item['studentId'], $item['bookId'], $item['loanDate'], $item['returnDate']);
            $borrow->id = $item['id'];
            array_push($array, $borrow);
        }
        return $array;
    }

    public function creat($obj)
    {
        $studentId = $obj->getStudentId();
        $bookId = $obj->getBookId();
        $loanDate = $obj->getLoanDate();
        $returnDate = $obj->getReturnDate();
        $sql = "INSERT INTO `borrowOrder`(`studentId`,`bookId`,`loanDate`,`returnDate`) VALUES ('$studentId','$bookId','$loanDate','$returnDate')";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function del($id)
    {
        $sql = "DELETE FROM `borrowOrder` WHERE id='$id'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function update($id, $studentId, $bookId, $loanDate, $returnDate)
    {
        $sql = "UPDATE `borrowOrder`  SET `studentId`='$studentId',`bookId`='$bookId',`loanDate`='$loanDate',`returnDate`='$returnDate' WHERE `id`='$id'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM `borrowOrder` WHERE `id`='$id'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetch();

        if ($data) {
            $borrow = new Borrow ($data['studentId'], $data['bookId'], $data['loanDate'], $data['returnDate']);
            $borrow->id = $data['id'];
            return $borrow;
        } else {
            return "Id không tồn tại";
        }
    }
}
