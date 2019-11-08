<?PHP
include('inc/conf.php');

$pass = md5($_POST['password']);
$sql ='select * from users where username="'.$_POST['username'].'" and password="'.$pass.'"';
//echo($sql);
$result = $conn->query($sql);
if($result->num_rows<1)
{
	header('location: index.php');
	exit();
}
else if($result->num_rows==1)
{
	header('location: admin/index.php?item=');
	exit();
}

?>