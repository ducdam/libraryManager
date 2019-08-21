<?php
include_once 'Student.php';
include_once 'DBStudent.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ((!empty($_POST['name'])) && (!empty($_POST['phone'])) && (!empty($_POST['address']))) {
        $id = $_GET['id'];
        var_dump($id);
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $studentDB = new DBStudent();
        $studentDB->update($name, $phone, $address, $id);
        header('location: list.php');
    } else {
        $id = $_GET['id'];
        $studentDB = new DBStudent();
        $student = $studentDB->findById($id);
        $alert = "Không được để trống !";
    }
} else {
    $id = $_GET['id'];
    $studentDB = new DBStudent();
    $student = $studentDB->findById($id);
    if (is_string($student)) {
        echo $student;
        echo "<a href='list.php'> Trở về</a>";
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
    <title>Update student</title>
</head>
<body>
<div style="margin-left: 30%">
    <h2>Update student</h2>
    <form method="post">
        <table border="1px" cellspacing="0px">
            <tr>
                <td>Id</td>
                <td><?php echo $student->getId() ?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" size="20" value="<?php echo $student->getName() ?>"></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input type="text" name="phone" size="20" value="<?php echo $student->getPhone() ?>"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" name="address" size="20" value="<?php echo $student->getAddress() ?>"></td>
        </table>
        <button type="submit">Update</button>
        <a href="list.php" type="button">Back</a>
        <?php echo $alert; ?>
    </form>
</div>
</body>
