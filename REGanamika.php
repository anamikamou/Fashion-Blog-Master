<!DOCTYPE html>
<html>

<head>
<style>
body  {
  background-image: url("images/fashionblog1.jpg");
  min-height: 380px;
  <!-- Center and scale the image nicely -->
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
  
  
 
}
.text-block {
  position: absolute;
  bottom: 20px;
  right: 20px;
  
  color: black;
  padding-left: 10px;
  padding-right: 1000px;
}
</style>

</head>
<body>



	<form action="REGanamika_check.php" method="post">
		
		<input type="email" name="email" placeholder="Email as Username" required> <br>
		<input type="password" name="password" placeholder="Password" required> <br>
		<input type="password" name="confirmPassword" placeholder="Confirm Password" required> <br>
		Gender: <br> 
		<!-- <select name="gender">
			<option value="">Select</option>
			<option value="male">Male</option>
			<option value="female">Female</option>
			<option value="other">Other</option>
		</select> -->
		<input type="radio" name="gender" value="Male">Male
		<input type="radio" name="gender" value="Female">Female
		<input type="radio" name="gender" value="Other"> Other

		<br>
		 
		<button>Register</button><br>
			Already Registered !!!
			<a class="link" href="LOGanamika.php" style=""><b>Login</b></a>


	</form>
	<div class="text-block">
    <p><font size="6"><i><b>Life is too short to wear boring clothes</b></i></font>
    <p>-Carlie Cushnie</p>
  </div>
</div>
	

</body>
</html>
