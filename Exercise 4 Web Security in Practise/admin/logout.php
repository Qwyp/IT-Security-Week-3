<?php
session_start();
$_SESSION['login'] = NULL;
session_destroy();
header('location: ../index.php');
?>