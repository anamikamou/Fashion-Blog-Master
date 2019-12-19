<!DOCTYPE html>
<html>
<head>
<style>
body  {
  background-image: url("images/login_pic.jpg");
  min-height: 380px;
  <!-- Center and scale the image nicely -->
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
  
 
}
</style>
</head>
<body>
	<div class="container">
		<form name="login" id="login" action="LOGanamika_check.php" method="POST">
			<h2>Sign In</h2>
			<input type="text" id="name" name="email" placeholder="Email as Username" required> <br><br>
			<input type="password" name="password" placeholder="Password" required> <br><br>
			<!--<input type="checkbox" name="rememberMe">Remember Me<br><br>-->
			<input type="submit" name="submit" id="submit_login" value="Login"> <br><br>
			Don't have an account?
			<a class="link" href="REGanamika.php" style=""><b>Sign Up</b></a>


		</form>
	</div>

</body>
</html>
