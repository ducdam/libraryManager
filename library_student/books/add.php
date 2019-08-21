<?php
include_once 'Book.php';
include_once 'DBBook.php';

if ($_SERVER['REQUEST_METHOD']=="POST") {
    if ((!empty($_POST['name']))&&(!empty($_POST['author']))&&(!empty($_POST['publish']))&&(!empty($_POST['publisher']))&&(!empty($_POST['categoryId']))) {
        $name = $_POST['name'];
        $author = $_POST['author'];
        $publish = $_POST['publish'];
        $publisher = $_POST['publisher'];
        $categoryId = $_POST['categoryId'];
        $book = new Book($name, $author, $publish, $publisher, $categoryId);
        $bookDB = new DBBook();
        $bookDB->creat($book);
        header('location: list.php', true);
    }else{
        $alert = "Không được bỏ trống !";
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div style="margin-left: 30%">
    <form method="post">
        <table border="1px" cellspacing="0px">
            <h2>Add new book</h2>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>Author</td>
                <td><input type="text" name="author"></td>
            </tr>
            <tr>
                <td>Publish</td>
                <td><input type="text" name="publish"></td>
            </tr>
            <tr>
                <td>Publisher</td>
                <td><input type="text" name="publisher"></td>
            </tr>
            <tr>
                <td>Category Id</td>
                <td><input type="text" name="categoryId"></td>
        </table>
        <button type="submit">Add</button>
        <a href="list.php">Back</a>
        <?php echo $alert ?>
    </form>

</div>
</body>
</html>
