<?php

include_once '../Borrow.php';
include_once '../DbBorrow.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET')
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $delete = new DbBorrow();
        $delete->del($id);
        header('location:read.php');
    }

