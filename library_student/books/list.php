<?php
include_once 'Book.php';
include_once 'DBBook.php';

$bookDB = new DBBook();
$books = $bookDB->getAll();
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

    <?php include '../layout/header.php'?>

    <h2>Book manger</h2>
    <form>
        <table border="1px" cellspacing="0px" >
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Author</td>
                <td>Publish</td>
                <td>Publisher</td>
                <td>Category Id</td>
                <td>Update</td>
                <td>Delete</td>
            </tr>
            <?php foreach ($books as $item=>$book): ?>
            <tr>
                <td><?php echo $book->getId(); ?></td>
                <td><?php echo $book->getName();?></td>
                <td><?php echo $book->getAuthor()?></td>
                <td><?php echo $book->getPublish()?></td>
                <td><?php echo $book->getPublisher()?></td>
                <td><?php echo $book->getCategoryId()?></td>
                <td><a href="update.php?id=<?php echo $book->getId(); ?>">Update</a></td>
                <td><a href="delete.php?id=<?php echo $book->getId(); ?>">Delete</a></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <a href="add.php">Add new book</a>
    </form>

    <?php include_once '../layout/footer.php'?>

</div>
</body>
</html>

