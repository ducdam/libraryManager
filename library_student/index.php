<?php
include_once 'DBConnect.php';
session_start();
if (isset($_SESSION['id'])) {
    if ($_SESSION['id'] == '1') {
        header('location:home.php');
    } else {
        header('location:index.php');
    }
} else {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (!empty($_POST["name"]) && !empty($_POST["pass"])) {
            $username = $_POST["name"];
            $password = $_POST["pass"];
            $Dbconnect = new DBconnect();
            $conn = $Dbconnect->connect();
            $sql = "SELECT * FROM users WHERE `name`='$username'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $resultUsername = $stmt->rowCount();
        }else{
            echo "Không được bỏ trống ";
        }
        if ($resultUsername != 0) {
            $sql = "SELECT * FROM users WHERE `name`='$username' and `pass`='$password'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetch();
            if ($result) {
                $_SESSION['id'] = $result['id'];
                if ($_SESSION['id'] == '1') {
                    header('location:home.php');
                } else {
                    header('location:index.php');
                }
            } else {
                echo 'sai mat khau';
            }
        } else {
            echo 'sai ten dang nhap';
        }
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
    <title>Login</title>
</head>
<body>
<div style="margin-left: 30%">
    <h2>Login</h2>
    <form method="post">
        <table border="1px" cellspacing="0px">
            <tr>
                <td>Username</td>
                <td><input type="text" name="name" placeholder="name = admin"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="text" name="pass" placeholder="pass = admin "></td>
            </tr>
        </table>
        <button type="submit">Submit</button>

    </form>
</div>
</body>
</html>
