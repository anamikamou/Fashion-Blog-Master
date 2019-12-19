<?php 
	require'db.php';
	$category = $_GET['cat'];
	if(isset($_COOKIE['cookieName'])){
    $cookie = $_COOKIE['cookieName'];
   // echo $_COOKIE['cookieName'];
}

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>TITLE</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">


	<!-- Font -->

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">


	<!-- Stylesheets -->

	<link href="common-css/bootstrap.css" rel="stylesheet">

	<link href="common-css/ionicons.css" rel="stylesheet">


	<link href="02-Single-post/css/styles.css" rel="stylesheet">

	<link href="02-Single-post/css/responsive.css" rel="stylesheet">

</head>
<body>
    <header>

		<div class="top-menu">

			<ul class="left-area welcome-area">
				<li class="hello-blog">Hello nice people, welcome to my blog</li>
				<li ><a href="#" >contact@anamikablog.com</a></li>
			</ul><!-- left-area -->
			<ul class="right-area welcome-area">
				<?php 
						if(isset($_COOKIE['cookieName']))
						{
							echo '<li><a href="#">'.$_COOKIE['cookieName']. '</a></li>'; 
							echo '<li><a href="logout.php">Logout</a></li>';
						}
						else
						{
							echo '<li><a href="REGanamika.php">Registration</a></li>';
							echo '<li><a href="LOGanamika.php">User Login</a></li>';

						}
					?>
			</ul>
		</div><!-- top-menu -->

		<div class="middle-menu center-text"><a href="#" class="logo"><img src="images/logo.png" alt="Logo Image"></a></div>

		<div class="bottom-area">

			<div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

			
			<ul class="main-menu visible-on-click" id="main-menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="category_homepage.php?cat=<?php echo $category; ?>"><?php echo $category ?></a></li>
				<li>
					<form action="search_result.php" method="GET">
	     				<input type="text" value="Search" id="searchBar" name="search" onfocus="this.value = '';" onmousedown="active();" onblur="if (this.value == '') {this.value = 'Search';}">
	     				<input type="submit" id="searchBtn" value="Go">
	     			</form>
				</li>
				
			</ul><!-- main-menu -->

		</div><!-- bottom-area -->

    </header>
<section class="section blog-area">
    <div class="container">
			<div class="row">
							<?php
								$sql = "SELECT * FROM post_table WHERE `category` = '$category'";
								$act = $db->query($sql);
								$i = 1;
								while ($data =$act -> fetch_assoc()) {
							?>
							

							<div class="col-lg-6 col-md-12">
								<div class="single-post">
									<div class="image-wrapper"><img src="images/<?php echo $data['image'] ?>" alt="Blog Image" height="350" width="650"></div>

									
									<h6 class="date"><em><?php echo $data['date']; ?></em></h6>
									<h3 class="title"><a href="singlePostDisplay.php?id=<?php echo $data['post_id']; ?>"><b class="light-color"><?php echo $data['post_title']; ?></b></a></h3>
									<p> <?php echo $data['details'] ?> </p>
									<a class="btn read-more-btn" href="singlePostDisplay.php?id=<?php echo $data['post_id']; ?>"><b>READ MORE</b></a>
								</div><!-- single-post -->
							</div><!-- col-sm-6 -->
						<?php } ?>


						</div><!-- row -->
	</div>  <!--container -->

</section>
			
<footer>
	<div class="container">
		<div class="row">

			<div class="col-sm-6">
				<div class="footer-section">
					<p class="copyright">Developed by Wahid Hasan and Anamika Mou</p>
				</div><!-- footer-section -->
			</div><!-- col-lg-4 col-md-6 -->

				

		</div><!-- row -->
	</div><!-- container -->
</footer>


	<!-- SCIPTS -->

	<script src="common-js/jquery-3.1.1.min.js"></script>

	<script src="common-js/tether.min.js"></script>

	<script src="common-js/bootstrap.js"></script>

	<script src="common-js/layerslider.js"></script>

	<script src="common-js/scripts.js"></script>




</body>
</html>