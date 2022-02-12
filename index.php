<?php
    require './includes/login.inc.php';
    
    $Login = new Login();
    session_start();
    if(isset($_SESSION['valid'])) {
        header('location:dashboard.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <title>Raspored</title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <form class="login-form" method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email adresa*</label>
            <input type="email" class="form-control" name='email' id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Lozinka*</label>
            <input type="password" class="form-control" name='password' id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label class="" for="exampleCheck1">Ako nemas racun, <a href="register.php">registruj se</a></label>
        </div>
        <?php

        if(isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $status = $Login->loginUser($email, $password);
            if($status['status'] == false) {
                echo '<div class="alert alert-danger" role="alert">'.$status['msg'].'</div>';
            } else {
                $_SESSION['email'] = $email;
                header('location:dashboard.php');
            }
        }
        ?>
        <button type="submit" class="btn btn-primary">Prijavi se</button>
    </form>

</body>
</html>

