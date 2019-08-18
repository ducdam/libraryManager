<?php
include_once 'Book.php';
include_once 'DBBook.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $book = new DBBook();
        $book->del($id);
    }
    header('location: list.php', true);
}
?>

