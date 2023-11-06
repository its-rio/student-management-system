<?php
session_start();

    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }

    else if($_SESSION['usertype']=='student'){
        header("location:login.php");
    }


    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <?php
    include 'admin_css.php';
    ?>
</head>
<body>
    <!-- <h1>Admin home</h1>
    <a href="logout.php">Logout</a> -->

    <?php
    include 'admin_sidebar.php';

    ?>

    <div class="content">
        <h1>Admin Dashboard</h1>
    </div>
</body>
</html>