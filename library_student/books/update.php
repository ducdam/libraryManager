<?php
include_once 'Book.php';
include_once 'DBBook.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ((!empty($_POST['name'])) && (!empty($_POST['author'])) && (!empty($_POST['categoryId'])) && (!empty($_POST['publish'])) && (!empty($_POST['publisher']))) {
        $id = $_GET['id'];
        $name = $_POST['name'];
        $author = $_POST['author'];
        $categoryId = $_POST['categoryId'];
        $publish = $_POST['publish'];
        $publisher = $_POST['publisher'];
        $book = new DBBook();
        $book->update($id, $name, $author, $categoryId, $publish, $publisher);
        header('location: list.php', true);
    } else {
        $id = $_GET['id'];
        $bookDB = new DBBook();
        $key = $bookDB->findById($id);
        $alert = "không được để trống";
    }
} else {
    $id = $_GET['id'];
    $newBook = new DBBook();
    $key = $newBook->findById($id);
    if (is_string($key)) {
        echo $key;
        echo "<a href='list.php'> Back</a>";
        die();
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
    <h2>Update book</h2>
    <form method="post">
        <table border="1px" cellspacing="0px">
            <tr>
                <td>Id</td>
                <td><?php echo $key->getId() ?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $key->getName(); ?>"></td>
            </tr>
            <tr>
                <td>Author</td>
                <td><input type="text" name="author" value="<?php echo $key->getAuthor(); ?>"></td>

            </tr>
            <tr>
                <td>Category Id</td>
                <td><input type="text" name="categoryId" value="<?php echo $key->getCategoryId(); ?>"></td>
            </tr>
            <tr>
                <td>Publish</td>
                <td><input type="text" name="publish" value="<?php echo $key->getPublish(); ?>"></td>
            </tr>
            <tr>
                <td>Publisher</td>
                <td><input type="text" name="publisher" value="<?php echo $key->getPublisher(); ?>"></td>
            </tr>
        </table>
        <button type="submit">Update</button>
        <a href="list.php">Back</a>
        <?php echo $alert; ?>
    </form>
</div>
</body>
</html>