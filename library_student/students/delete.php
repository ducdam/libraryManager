<?php
include_once 'Student.php';
include_once 'DBStudent.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $studentDB = new DBstudent();
        $studentDB->del($id);
    }
    header('location: list.php', true);
}
?>

