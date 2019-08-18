<?php

include_once 'Borrow.php';
include_once 'DbBorrow.php';

$borrowDb = new DbBorrow();
$borrowDb->getAll();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Borrow order</title>
</head>
<body>
<form>
    <div style="margin-left: 30%">

        <?php include_once '../layout/header.php'?>

        <h2>Borrow order</h2>
        <table border="1" cellspacing="0">
            <tr>
                <td>Id</td>
                <td>Student id</td>
                <td>Book id</td>
                <td>Loan date</td>
                <td>Return date</td>
                <td>Delete</td>
                <td>Update</td>
            </tr>
            <?php foreach ($borrowDb->getAll() as $key => $value): ?>
                <tr>
                    <td><?php echo ++$key; ?></td>
                    <td><?php echo $value->getStudentId(); ?></td>
                    <td><?php echo $value->getBookId(); ?></td>
                    <td><?php echo $value->getLoanDate(); ?></td>
                    <td><?php echo $value->getReturnDate(); ?></td>
                    <td><span><a href="delete.php?id=<?php echo $value->getId(); ?>">Delete</a></span></td>
                    <td><span><a href="update.php?id=<?php echo $value->getId(); ?>">Update</a></span></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <a href="create.php" type="button">Add new borrow order</a>

        <?php include_once '../layout/footer.php'?>
    </div>
</form>
</body>
</html>


