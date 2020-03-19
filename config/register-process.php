<?php
require 'config.php';

//initialize variables
$email = '';
$username = '';
$password1 = '';
$password2 = '';
$errors = array();

if(isset($_POST['register'])){
    $email = pg_escape_string($_POST['email']);
    $username = pg_escape_string($_POST['username']);
    $password1 = pg_escape_string($_POST['password1']);
    $password2 = pg_escape_string($_POST['password2']);

    // errors
    if($email == ''){
        array_push($errors, "Please enter an email");
    }
    if($username == ''){
        array_push($errors, "Please enter a username");
    }
    if($password1 == ''){
        array_push($errors, "Please enter a password");
    }
    if($password2 == ''){
        array_push($errors, "Please reenter your password");
    }
    if($password1 != $password2){
        array_push($errors, "Passwords do not match");
    }
    // check for existing account
    $sql = pg_query("SELECT * FROM users WHERE email = '$email' OR username = '$username' LIMIT 1");
    $result = pg_fetch_assoc($sql);
    if($result){
        if($result['email'] === $email){
            array_push($errors, "Email already taken");
        }if($result['username'] === $username){
            array_push($errors, "Username already taken");
        }
    }

    // insert data into database
    if(count($errors) == 0) {
        // enter user data into users table
        $query = pg_query("INSERT INTO users(username, email, password) VALUES ('$username', '$email', '$password1')");

        // get new user
        $query = pg_query("SELECT * FROM users WHERE username = '$username' ");
        $result = pg_fetch_assoc($query);

        // create default categories for user
        $username = $result['username'];

        // set session variables
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;

        //redirect to dashboard
        header('location: dashboard.php');
    }
}

?>