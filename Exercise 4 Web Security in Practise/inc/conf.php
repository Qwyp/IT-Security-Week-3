<?php
$host = 'localhost';
$username = 'root';
$password = '';
$conn = mysqli_connect($host, $username, $password);
$db = mysqli_select_db($conn,"project");
?>