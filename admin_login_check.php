<?php
//session_regenerate_id(true);
require'db.php';

$email = $_POST['email'];
$password = $_POST['password'];

if(empty($_POST['email']) || empty($_POST['password']))
{
	$_SESSION['error'] = 'Input field cannot be empty';
	header('Location: admin_login.php');
}
	
elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
{
	$_SESSION['error'] = 'ERROR: Invalid EMAIL format';
	header('Location: admin_login.php');
}

else
	{
		$sql = "SELECT email FROM admin_table WHERE `email` = '$email' AND `password` = '$password'";
		$act = $db->query($sql);
		$row = mysqli_num_rows($act);

		/*foreach ($act as $key) {
			$name = $key['name'];
			#$type = $key['type'];
		}*/
	
		if($row >= 1)
		{
			
			//$_SESSION['email'] = $userEmail;
			session_start();
			$_SESSION['email'] = $email;
			//echo $_SESSION['email'] ;
			// $_SESSION['userpassword'] = $useremail;
			// $_SESSION['fullname'] = $name;

				//setcookie('cookieName',$email,time() + 36000);

			header('Location:admin_index.php');
		}
		else
		{
			//$_SESSION['error'] = 'Id / Password is not match';
			header('Location: admin_login.php');
		}
	}

?>