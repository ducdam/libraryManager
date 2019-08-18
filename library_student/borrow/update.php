<?php
include_once 'Borrow.php';
include_once 'DbBorrow.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['studentId']) && !empty($_POST['bookId']) && !empty($_POST['loanDate']) && !empty($_POST['returnDate'])) {
        $id = $_GET['id'];
        $studentId = $_POST['studentId'];
        $bookId = $_POST['bookId'];
        $loanDate = $_POST['loanDate'];
        $returnDate = $_POST['returnDate'];
        $update = new DbBorrow();
        $update->update($id, $studentId, $bookId, $loanDate, $returnDate);
        header('location: read.php');
    } else {
        $id = $_GET['id'];
        $update = new DbBorrow();
        $update->findById($id);
        $alert = "Không được để trống";
    }
} else {
    $id = $_GET['id'];
    $update = new DbBorrow();
    $borrow = $update->findById($id);
    if (is_string($borrow)) {
        echo $borrow;
        echo "<a href='read.php'>Back</a>";
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
    <title>Update category</title>
</head>
<body>
<div style="margin-left: 30%">
    <h2>Update category</h2>
    <form method="post">
        <table border="1px" cellspacing="0px">
            <tr>
                <td>id</td>
                <td><?php echo $_GET['id'] ?></td>
            </tr>
            <tr>
                <td>Student Id</td>
                <td><input type="text" name="studentId" value="<?php echo $borrow->getStudentId() ?>"></td>
            </tr>
            <tr>
                <td>Book Id</td>
                <td><input type="text" name="bookId" value="<?php echo $borrow->getBookId() ?>"></td>
            </tr>
            <tr>
                <td>Loan date</td>
                <td><input type="text" name="loanDate" value="<?php echo $borrow->getLoanDate() ?>"></td>
            </tr>
            <tr>
                <td>Return date</td>
                <td><input type="text" name="returnDate" value="<?php echo $borrow->getReturnDate() ?>"></td>
            </tr>
        </table>
        <button type="submit">Update</button>
        <a href="read.php">Back</a>
        <?php echo $alert ?>
    </form>
</div>
</body>
</html>
