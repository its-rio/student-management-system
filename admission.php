<?php
 session_start();

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

    $sql = "SELECT * FROM admission";

    $result = mysqli_query($data, $sql);
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
    <?php
    include 'admin_sidebar.php';

    ?>

    <div class="content">
    <center>
        <h1>Applied for admission</h1>
        <br><br>
        
        <table border="1px">
            <tr>
                <th style="padding: 20px; font-size:15">name</th>
                <th style="padding: 20px; font-size:15">email</th>
                <th style="padding: 20px; font-size:15">phone</th>
                <th style="padding: 20px; font-size:15">message</th>
            </tr>
            <?php
            while($info = $result->fetch_assoc())
            {

            ?>
            <tr>
                <td style="padding: 20px; font-size:15">
                <?php echo "{$info['name']}"; ?>
            </td>
                <td style="padding: 20px; font-size:15">
                <?php echo "{$info['email']}"; ?>
            </td>
                <td style="padding: 20px; font-size:15">
                <?php echo "{$info['phone']}"; ?>
            </td>
                <td style="padding: 20px; font-size:15">
                <?php echo "{$info['message']}"; ?>
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