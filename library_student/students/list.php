<?php


include_once 'Student.php';
include_once 'DBStudent.php';

$studentDb = new DBStudent();
$students = $studentDb->getAll();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Manger</title>
</head>
<body>
<form>
    <div style="margin-left: 30%">

        <?php include_once '../layout/header.php'?>

        <h2>Student manger</h2>
        <table border="1" cellspacing="0">
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Phone</td>
                <td>Address</td>
                <td>Delete</td>
                <td>Update</td>
            </tr>
            <?php foreach ($students as $key => $student): ?>
                <tr>
                    <td><?php echo $student->getId(); ?></td>
                    <td><?php echo $student->getName(); ?></td>
                    <td><?php echo $student->getPhone(); ?></td>
                    <td><?php echo $student->getAddress(); ?></td>
                    <td><span><a href="delete.php?id=<?php echo $student->getId(); ?>">Delete</a></span></td>
                    <td><span><a href="update.php?id=<?php echo $student->getId(); ?>">Update</a></span></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <a href="add.php" type="button">Add new student</a>

        <?php include_once '../layout/footer.php'?>

    </div>
</form>
</body>
</html>



