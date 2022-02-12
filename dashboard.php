<?php 
    require './includes/dashboard.inc.php';
    $Dashboard = new Dashboard;
    session_start();
        // $Dashboard->print($_SESSION['valid']);
        // echo $_SESSION['valid'];
        if(empty($_SESSION['valid']) === '') {
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>

    <?php
        if($Dashboard->isAdmin($_SESSION['email'])) {
            echo 'admin';
        } else {
            echo 'nije admin';
        }
    ?> 
</body>

</html>