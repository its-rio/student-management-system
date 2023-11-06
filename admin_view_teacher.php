<?php
session_start();
error_reporting(0);

    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }

    else if($_SESSION['usertype']=='student'){
        header("location:login.php");
    }

    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "schoolproject";

    $data = mysqli_connect($host, $user, $password, $db);
    
    $sql = "SELECT * FROM teacher";

    $result = mysqli_query($data, $sql);

    if($_GET['teacher_id']){
        $t_id = $_GET['teacher_id'];

        $sql2 = "DELETE FROM teacher WHERE id= '$t_id' ";

        $result2 = mysqli_query($data, $sql2); 

        if($result2){
            header('location:admin_view_teacher.php');
        }
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

    <style>
        .table_td{
            padding: 20px;
            font-size: 20px;
        }
        .table_th{
            padding: 20px;
            background-color: skyblue;
        }
    </style>
</head>
<body>
    <!-- <h1>Admin home</h1>
    <a href="logout.php">Logout</a> -->

    <?php
    include 'admin_sidebar.php';

    ?>

    <div class="content">
        <center>
        <h1>View All Teachers Data</h1>

        <table border="1px">
            <tr>
                <th class="table_th">Teacher Name</th>
                <th class="table_th">About Teacher</th>
                <th class="table_th">Teacher Image</th>
                <th class="table_th">Delete</th>
            </tr>

            <?php 
            while($info=$result->fetch_assoc()){

            ?>

            <tr>
                <td class="table_td"><?php echo "{$info['name']}" ?></td>
                <td class="table_td"><?php echo "{$info['description']}" ?></td>
                <td class="table_td">
                    <img height="100px" width="100px" src="<?php echo "{$info['image']}"; ?>">
                </td>

                <td class="table_td">
                    <?php
                     echo "
                     <a onClick=\"javascript:return confirm('Are you sure to Delete this')\" class='btn btn-danger' href='admin_view_teacher.php?teacher_id={$info['id']}'>
                     Delete
                     </a>"
                     ?>
                </td> 
               
            </tr>

            <?php 
            }
            ?>

        </table>
        </center>
    </div>
</body>
</html>