<?php
session_start();
session_destroy();

//unisti sesija i vrati na login/register
header('location:index.php');

?>