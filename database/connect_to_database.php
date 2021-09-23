<?php 
$con = mysqli_connect('localhost', 'root', '') or die ("Couldn't connect to server");
mysqli_select_db($con, 'covid') or die ("Couldn't connect to database");
?>