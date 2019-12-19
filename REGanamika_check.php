<?php 

require 'db.php';
//session_start();

	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirmPassword'];
	$gender = $_POST['gender'];
	
	if(empty($_POST['password']) || empty($_POST['confirmPassword']) || empty($_POST['email']) ||  empty($_POST['gender']))
	{
		//$_SESSION['error'] = 'ERROR: All input field is required !!!!';
		header('Location: REGanamika.php');
	}
	
	
		
	elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
	{
		//$_SESSION['error'] = 'ERROR: Invalid EMAIL format';
		header('Location: REGanamika.php');
	}
	elseif($password != $confirm_password)
	{
			#$error = 'Password must contain uppercase,lowercase,number,special char';
		$_SESSION['error'] = 'ERROR: Password not match';
		header('Location: REGanamika.php');
			#echo "ERROR: Both the password cannot match!!!";
	}
	else
	{

		$sql = "SELECT email FROM user_table WHERE `email` = '$email'";
		$sql2 = "INSERT INTO user_table(`email`, `password`, `gender`) VALUES ('$email','$password', '$gender')";

		$act = $db->query($sql);
		$row = mysqli_num_rows($act);

		if($row >= 1)
		{
			$_SESSION['error'] = 'This email already registered';
			header('Location: REGanamika.php');
		} 
		else 
		{
			$act2 = $db->query($sql2);
			$_SESSION['success'] = 'User registration successful...';
			header('Location: LOGanamika.php');
			#header('Location: register.php');
		}
	}



	#echo $id. ' '. $name . ' '.$email. ' '.$pass. ' '. $confirm. ' '.$type;


?>