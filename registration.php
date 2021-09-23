<?php

session_start();
//after registration redirect to login page
header('location:index.php');

$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'covid');



$first_name = @$_POST['firstName']; 
$last_name = @$_POST['last_name'] ;
$age = $_POST['age'];
$gender = @$_POST['gender'] ;
$username = $_POST['user'];
$password = $_POST['password'];


$s = "select * from user_table where username = '$username'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num==1){
    echo "Username already taken!";
}else{
    $registration = "INSERT INTO user_table(first_name, last_name, username, password, age, gender) VALUES('$first_name', '$last_name', '$username', '$password', '$age', '$gender')";
    mysqli_query($con, $registration);
    echo("Registration successful!");
}



?>