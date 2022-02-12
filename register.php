<?php 
    require './includes/register.inc.php';

    $Register = new Register();

    session_start();
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/register.css">
    <title>Raspored</title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <form class="register-form" method="post">
        <div class="mb-3">
            <label for="fname" class="form-label">Ime*</label>
            <input type="text" name="fname" class="form-control" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="lname" class="form-label">Prezime*</label>
            <input type="text" name="lname" class="form-control">
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Korisnicko ime*</label>
            <input type="text" name="username" class="form-control">
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Email*</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Sifra*</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3">
            <label for="confirm-password" class="form-label">Potvrdi sifru*</label>
            <input type="password" name="confirm-password" class="form-control">
        </div>
        <div class="mb-3">
            <label class="" for="exampleCheck1">Ako vec imas racun, <a href="index.php">prijavi se</a></label>
        </div>

        <?php 
            if(isset($_POST['email']) 
            && isset($_POST['password'])
            && isset($_POST['confirm-password'])
            && isset($_POST['fname'])
            && isset($_POST['lname'])
            && isset($_POST['username'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $username = $_POST['username'];
                $confirm_password = $_POST['confirm-password'];
                if ($password != $confirm_password) {
                    echo '<div class="alert alert-danger" role="alert">Molimo da potvrdite vasu sifru.</div>';
                } else {
                    $status = $Register->registerUser($fname,$lname,$email,$password,$username);
                    if($status['status'] == false) {
                        echo '<div class="alert alert-danger" role="alert">'.$status['msg'].'</div>';
                    } else {
                        $_SESSION['valid'] = true;
                        $_SESSION['email'] = $email;
                        header('location:dashboard.php');
                    }
                }
            }
        ?>
        <button type="submit" class="btn btn-primary">Registruj se</button>
    </form>
</body>

</html>