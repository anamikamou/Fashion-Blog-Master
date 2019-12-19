<?php
session_start();
session_destroy();
$type = $_GET['type'];
if (isset($_COOKIE['cookieName'])){
		
		setcookie('cookieName',$useremail,time() - 86400);
	}

if($type == 'admin')
{
	header("Location: admin_login.php");
}
else
{
	header("Location: index.php");
}
?>