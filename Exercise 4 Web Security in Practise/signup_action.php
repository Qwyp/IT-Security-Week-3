<?php
include('inc/conf.php');


$username = $_POST["username"];
$password =md5($_POST["password"]);;


$sql = 'insert into users values("NULL","'.$username.'","'.$password.'")';
$result = $conn->query($sql);
header('location: index.php');
exit();
?>