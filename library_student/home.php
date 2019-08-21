<?php
session_start();
if(isset($_SESSION['id'])){
}else
    header('location: index.php');
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
<a href="logout/logout.php">Logout</a>
<div style="margin-left: 30%">
    <?php include_once 'layout/header.php' ?>

    <img src="img/123.jpg">

    <?php include_once 'layout/footer.php' ?>
    http://localhost/module2/library_student/home.php
</div>
</body>
</html>
