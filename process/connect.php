<?php

$connection = mysqli_connect('localhost', 'root', '123456');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'multi_login');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}

?>