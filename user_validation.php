<?php
session_start();

//connect to database
require_once("./database/connect_to_database.php");

//get user and password from form
$username = $_POST['user'];
$password = $_POST['password'];


$s = "select * from user_table where username = '$username' && password = '$password'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num==1){
    $_SESSION['username'] = $username;
    header('location:homepage.php');
    echo "Username already taken!";
}else{
    header('location:index.php');
    echo("Wrong username or password!");
}



?>