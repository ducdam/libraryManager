<?php
include_once 'Category.php';
include_once 'DBCategory.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET')
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $delete = new DBCategory();
        $delete->del($id);
        header('location:read.php');
    }
?>
