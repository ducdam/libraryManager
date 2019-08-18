<?php
include_once 'Category.php';
include_once 'DBCategory.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['name'])) {
        $id = $_GET['id'];
        $name = $_POST['name'];
        $update = new DBCategory();
        $update->update($id, $name);
        header('location: read.php');
    } else {
        $id = $_GET['id'];
        $categorys = new DBCategory();
        $category = $categorys->findById($id);
        $alert = "Không được để trống";
        }
} else {
        $id = $_GET['id'];
        $categorys = new DBCategory();
        $category = $categorys->findById($id);
        if(is_string($category)){
            echo $category;
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
                <td><?php echo $category->getId() ?></td>
            </tr>
            <tr>
                <td>name</td>
                <td><input type="text" name="name" value="<?php echo $category->getName() ?>"></td>
            </tr>
        </table>
        <button type="submit">Update</button>
        <a href="read.php">Back</a>
        <?php echo $alert ?>
    </form>
</div>
</body>
</html>
