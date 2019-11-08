<?PHP
function checkAuth()
{
	if(empty($_SESSION['login']))
	{
		header('location: ../index.php?err=2');
		exit();
	}
}
?>