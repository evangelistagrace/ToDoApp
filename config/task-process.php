<?php
require 'config.php';


if(isset($_POST['add-item'])){
    $itemname = $_POST['item-name'];
    $itemstatus = FALSE;
    $itemdate = $_POST['item-date'];
    $itemuser = $_SESSION['username'];

    $query = pg_query("INSERT INTO items (itemname, itemdate, itemstatus, itemuser) VALUES ('$itemname', '$itemdate', FALSE, '$itemuser')");

    header('location: ../pages/dashboard.php');
}
if(isset($_GET['task-status'])){
    $taskstatus = $_GET['task-status'];
    $taskid = $_GET['task-id'];

    //change status of task
    if($taskstatus === 'f'){
        $query = pg_query("UPDATE items SET itemstatus = 'TRUE' WHERE id = $taskid");
    }else if($taskstatus === 't'){
        $query = pg_query("UPDATE items SET itemstatus = 'FALSE' WHERE id = $taskid");
    }

    header('location: ../pages/dashboard.php');
}

if(isset($_GET['logout'])){
    unset($_SESSION['username']);
    header('location: ../pages/index.php');
}

?>