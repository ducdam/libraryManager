<?php
include_once 'Borrow.php';
include_once 'DbBorrow.php';

if($_SERVER['REQUEST_METHOD']=="POST"){
    if(!empty($_POST['studentId'])&&!empty($_POST['studentId'])&&!empty($_POST['loanDate'])&&!empty($_POST['returnDate'])){
        $studentId = $_POST['studentId'];
        $bookId = $_POST['bookId'];
        $loanDate = $_POST['loanDate'];
        $returnDate = $_POST['returnDate'];
        $borrow = new Borrow($studentId,$bookId,$loanDate,$returnDate);
        $borrowDb = new DbBorrow();
        $borrowDb->creat($borrow);
        header('location: read.php');
    }else{
        $alert = "Không được bỏ trống ";
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
    <title>Add new category</title>
</head>
<body>
<div style="margin-left: 30%">
    <form method="post" >
        <h2>Add new borrow order</h2>
        <table border="1px" cellspacing="0px">
            <tr>
                <td>StudentId</td>
                <td><input type="text" name="studentId" value="00"></td>
            </tr>
            <tr>
                <td>BookId</td>
                <td><input type="text" name="bookId" value="00"></td>
            </tr>
            <tr>
                <td>Loan Date</td>
                <td><input type="text" name="loanDate" value="0000-00-00"></td>
            </tr>
            <tr>
                <td>Return Date</td>
                <td><input type="text" name="returnDate" value="0000-00-00"></td>
            </tr>
        </table>
        <button type="submit" name="submit">Add</button>
        <a href="read.php">Back</a>
        <?php echo $alert ?>
    </form>
</div>

</body>
</html>
