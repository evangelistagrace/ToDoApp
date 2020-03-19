<?php
require '../config/register-process.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register | Daily-Do</title>

    <link rel="stylesheet" href="../css/bootstrap/bootstrap.css" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/register.css">

    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Serif:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One|Quicksand:400,500|Roboto&display=swap" rel="stylesheet">

</head>

<body>
<div class="container">
    <div class="row">
        <div class="half-background bg-light">
            <div class="title">
                <h2>Daily-Do</h2>
                <h4>Register</h4>
            </div>
        </div>

    </div>
    <div class="row">
        <?php if(count($errors)) : ?>
            <div class="error">
                <?php foreach($errors as $error): ?>
                    <div class="alert alert-danger"><?php echo $error ?></div>
                <?php endforeach ?>
            </div>
        <?php endif ?>
        <form method="POST" action="register.php">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" aria-describedby="emailHelp" name="email">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" aria-describedby="emailHelp" name="username">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password1">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Confirm Password</label>
                <input type="password" class="form-control" name="password2">
            </div>
            <button class="btn btn-block btn-primary" name="register">Register</button>
            <small>Have an account already? <a href="login.php">Login</a></small>
        </form>
        <div>
        </div>
</body>

</html>