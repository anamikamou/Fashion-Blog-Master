<?php
//session_start();
//session_regenerate_id(true);
require'db.php';

$email = $_POST['email'];
$password = $_POST['password'];

if(empty($_POST['email']) || empty($_POST['password']))
{
	$_SESSION['error'] = 'Input field cannot be empty';
	header('Location: LOGanamika.php');
}
	
elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
{
	echo "ERROR: Invalid EMAIL format";
	//$_SESSION['error'] = 'ERROR: Invalid EMAIL format';
	//header('Location: LOGanamika.php');
}

else
	{
		$sql = "SELECT `email` FROM user_table WHERE `email` = '$email' AND `password` = '$password'";
		$act = $db->query($sql);
		$row = mysqli_num_rows($act);

		/*foreach ($act as $key) {
			$name = $key['name'];
			#$type = $key['type'];
		}*/
	
		if($row >= 1)
		{
			
			//$_SESSION['email'] = $email;
			session_start();
			$_SESSION['useremail'] = $email;
			// $_SESSION['userpassword'] = $useremail;
			// $_SESSION['fullname'] = $name;

				setcookie('cookieName',$email,time() + 36000);
				// setcookie('id',$id,time() + 86400);
				// setcookie('name',$name,time() + 86400);


			header('Location: index.php');
		}
		else
		{
			//$_SESSION['error'] = 'Id / Password is not match';
			header('Location: LOGanamika.php');
		}
	}

?>