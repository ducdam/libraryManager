<?php
include_once 'Category.php';
include_once 'DBCategory.php';

$categoryDB = new DBCategory();
$categorys=$categoryDB->getAll();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categorys</title>
</head>
<body>
<div style="margin-left: 30%">

    <?php include_once '../layout/header.php'?>

    <h2>Categorys</h2>
    <table border="1px" cellspacing="0px">
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Update</td>
            <td>Delete</td>
        </tr>
        <?php foreach ($categorys as $item=>$category): ?>
            <tr>
                <td><?php echo $category->getId()?></td>
                <td><?php echo $category->getName();?></td>
                <td><a href="update.php?id=<?php echo $category->getId();?>">Update</a></td>
                <td><a href="delete.php?id=<?php echo $category->getId(); ?>">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="create.php">Add new category</a>

    <?php include_once '../layout/footer.php'?>

</div>
</body>
</html>

