<?php
include_once 'Category.php';
include_once 'DBCategory.php';

if($_SERVER['REQUEST_METHOD']=="POST"){
    if(!empty($_POST['name'])){
        $name = $_POST['name'];
        $category = new Category($name);
        $categorys = new DBCategory();
        $categorys->creat($category);
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
    <form method="post">
        <h2>Add new category</h2>
        <table border="1px" cellspacing="0px">
            <tr>
                <td>Name</td>
                <td><input type="text" name="name"></td>
            </tr>
        </table>
        <button type="submit">Add</button>
        <a href="read.php">Back</a>
        <?php echo $alert ?>
    </form>
</div>

</body>
</html>
