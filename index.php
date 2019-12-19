<?php 
	require'db.php';
	if(isset($_COOKIE['cookieName'])){
    $cookie = $_COOKIE['cookieName'];
    echo $_COOKIE['cookieName'];
}

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Fashion Blog</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">


	<!-- Font -->

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">


	<!-- Stylesheets -->

	<link href="common-css/bootstrap.css" rel="stylesheet">

	<link href="common-css/ionicons.css" rel="stylesheet">

	<link href="common-css/layerslider.css" rel="stylesheet">


	<link href="01-homepage/css/styles.css" rel="stylesheet">

	<link href="01-homepage/css/responsive.css" rel="stylesheet">
	<script type="text/javascript">
		function active()
		{
			var searchBar = document.getElementById('searchBar');
			if(searchBar.value == 'Search')
			{
				searchBar.value='';
			}
		}
	</script>

</head>
<body>

	<header>

		<div class="top-menu">

			<ul class="left-area welcome-area">
				<li class="hello-blog">Hello nice people, welcome to my blog</li>
				<li ><a href="#" >contact@anamikamou9@gmail.com</a></li>

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
			<ul>
				
			</ul>


		</div><!-- top-menu -->

		<div class="middle-menu center-text"><a href="#" class="logo"><img src="images/logo.png" alt="Logo Image"></a></div>


			<div class="search_box">
	     		
	     	</div>

		<div class="bottom-area">

			<div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

			
			<ul class="main-menu visible-on-click" id="main-menu">
				<li><a href="category_homepage.php?cat=Designer"><i>DESIGNERS</i></a></li>
				<li><a href="category_homepage.php?cat=Celebrity"><i>CELEBRITY</i></a></li>
				<li><a href="category_homepage.php?cat=Cloth"><i>CLOTHINGSTYLE</i></a></li>
				<li><a href="category_homepage.php?cat=Lifestyle"><i>LIFESTYLE</i></a></li>
				<li>
					<form action="search_result.php" method="GET">
	     				<input type="text" value="Search" id="searchBar" name="search" onfocus="this.value = '';" onmousedown="active();" onblur="if (this.value == '') {this.value = 'Search';}">
	     				<input type="submit" id="searchBtn" value="Go">
	     			</form>
				</li>
			</ul><!-- main-menu -->

		</div><!-- conatiner -->
	</header>


	<div class="main-slider">
		<div id="slider">

			<div class="ls-slide" data-ls="bgsize:cover; bgposition:50% 50%; duration:4000; transition2d:104; kenburnsscale:1.00;">
				<img src="images/slider-1-1600x800.jpg" class="ls-bg" alt="" />

					

			</div><!-- ls-slide -->

			<div class="ls-slide" data-ls="bgsize:cover; bgposition:50% 50%; duration:4000; transition2d:104; kenburnsscale:1.00;">
				<img src="images/win.jpg" class="ls-bg" alt="" />


			</div><!-- ls-slide -->

		</div><!-- slider -->
	</div><!-- main-slider -->


	<section class="section blog-area">
		<div class="container">
			<div class="row">

				<div class="col-lg-8 col-md-12">
					<div class="blog-posts">

					<?php
						$sql = "SELECT * FROM post_table WHERE `category` = 'Festival'";
						$act = $db->query($sql);
						$i = 1;
						while ($data =$act -> fetch_assoc()) {
					?>

						<div class="single-post">
							<div class="image-wrapper"><img src="images/<?php echo $data['image'] ?>" alt="Blog Image"></div>

							
							<p class="date"><em><?php echo $data['date'] ?></em></p>
							<h3 class="title"><a href="singlePostDisplay.php?id=<?php echo $data['post_id']; ?>"><b class="light-color"><?php echo $data['post_title']  ?></b></a></h3>
							<p> <?php echo $data['details'] ?></p>
							<a class="btn read-more-btn" href="singlePostDisplay.php?id=<?php echo $data['post_id']; ?>"><b>READ MORE</b></a>
						</div><!-- single-post -->
						<?php $i = $i + 1; ?>

					<?php } ?>



						<div class="row">
							<?php
								$sql = "SELECT * FROM post_table WHERE `category` = 'Fashion'";
								$act = $db->query($sql);
								$i = 1;
								while ($data =$act -> fetch_assoc()) {
							?>
							

							<div class="col-lg-6 col-md-12">
								<div class="single-post">
									<div class="image-wrapper"><img src="images/<?php echo $data['image'] ?>" alt="Blog Image" height="220" width="120"></div>

									
									<h6 class="date"><em><?php echo $data['date']; ?></em></h6>
									<h3 class="title"><a href="singlePostDisplay.php?id=<?php echo $data['post_id']; ?>"><b class="light-color"><?php echo $data['post_title']; ?></b></a></h3>
									<p> <?php echo $data['details'] ?> </p>
									<a class="btn read-more-btn" href="singlePostDisplay.php?id=<?php echo $data['post_id']; ?>"><b>READ MORE</b></a>
								</div><!-- single-post -->
							</div><!-- col-sm-6 -->
						<?php } ?>


						</div><!-- row -->

						

					</div><!-- blog-posts -->
				</div><!-- col-lg-4 -->


				<div class="col-lg-4 col-md-12">
					<div class="sidebar-area">

						<div class="sidebar-section about-author center-text">
							<div class="author-image"><img src="images/ana.jpg" alt="Autohr Image"></div>

							<ul class="social-icons">
								<li><a href="https://www.facebook.com/anamika.mou.399" target="_blank"><i class="ion-social-facebook-outline"></i></a></li>
								
								<li><a href="https://www.instagram.com/anamika.mou/?fbclid=IwAR3Mg28-fweDypy2soGWB4k7tBI_BY10czOAldwsbq1AN9DRPM7pGcywrHI" target="_blank"><i class="ion-social-instagram-outline"></i></a></li>
								
							
							</ul><!-- right-area -->

							<h4 class="author-name"><b class="light-color">Anamika Mou</b></h4>
							<p>Hey ! I am Anamika.I am studying CSE at East West University,Dhaka,Bangladesh.I have huge interest on Fashion and i love fashion! check out my blog and trust me you'll not be bore ;) <3</p>

							<div class="signature-image"><img src="images/signature-image.png" alt="Signature Image"></div>
							
						</div><!-- sidebar-section about-author -->

						

						

						<div class="sidebar-section category-area">
							<h4 class="title"><b class="light-color">Categories</b></h4>
							<a class="category" href="sub_category.php?sub_cat=Person">
								<img src="images/person.jpg" alt="Category Image">
								<h6 class="name">PERSON</h6>
							</a>

							<a class="category" href="sub_category.php?sub_cat=Season">
								<img src="images/category-2-400x150.jpg" alt="Category Image">
								<h6 class="name"> SEASON</h6>
							</a>

							<a class="category" href="sub_category.php?sub_cat=Festival">
								<img src="images/category-3-400x150.jpg" alt="Category Image">
								<h6 class="name">FESTIVAL</h6>
							</a>
						</div><!-- sidebar-section category-area -->

						<div class="sidebar-section latest-post-area">
							<h4 class="title"><b class="light-color">Others</b></h4>
							<div class="latest-post" href="#">
							<?php
								$i = 2;
								$sql = "SELECT * FROM post_table WHERE `category` = 'Designer'";
								$act = $db->query($sql);
								
								while ($data =$act -> fetch_assoc()) {
							?>

							
								<div class="l-post-image"><img src="images/<?php echo $data['image'] ?>"></div>
								<div class="post-info">
									<a class="btn category-btn" href="singlePostDisplay.php?id=<?php echo $data['post_id']; ?>">DESIGNER</a>
									<h5><a href="#"><b class="light-color"><?php echo $data['post_title']; ?></b></a></h5>
									<h6 class="date"><em><?php echo $data['date']; ?></em></h6>
								</div>
							</div>
						<?php } ?>


						</div><!-- sidebar-section latest-post-area -->
					</div><!-- about-author -->
				</div><!-- col-lg-4 -->

			</div><!-- row -->
		</div><!-- container -->
	</section><!-- section -->


	


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
