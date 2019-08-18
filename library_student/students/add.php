<?php
include_once 'DBStudent.php';
include_once 'Student.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ((!empty($_POST['name'])) && (!empty($_POST['phone'])) && (!empty($_POST['address']))) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $student = new Student($name, $phone, $address);
        $studentDB = new DBStudent();
        $studentDB->create($student);
        header('location: list.php', true);
    } else {
        $alert = "Không được để trống !";

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
    <title>Add new student</title>
</head>
<body>
<div style="margin-left: 30%">
    <h2>Add new student</h2>
    <form method="post">
        <table border="1px" cellspacing="0px">
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" size="20"></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input type="text" name="phone" size="20"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" name="address" size="20"></td>
            </tr>
        </table>
        <button type="submit">Add</button
    </form>
    <a href="list.php" type="button">Back</a>
    <br><br><?php echo $alert; ?>
</div>
</body>
