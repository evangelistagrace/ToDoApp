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

?>