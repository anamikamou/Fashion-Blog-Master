<?php
//include("check_session.php");
require'db.php';
session_start();

if(isset($_SESSION['email'])){
    $session = $_SESSION['email'];
   // echo $session;

//error_reporting(0);
if(isset($_POST['submit'])){
$post_id = $_POST['post_id'];
$post_title=$_POST['post_title'];
$post_keyword=$_POST['post_keyword'];
$category = $_POST['category'];
$sub_category = $_POST['sub_category'];
$sub_sub_category = $_POST['sub_sub_category'];
$details=$_POST['details'];
$post_type=$_POST['post_type'];
$date= date("d-m-y");

//picture coding
$picture_name=$_FILES['picture']['name'];
$picture_type=$_FILES['picture']['type'];
$picture_tmp_name=$_FILES['picture']['tmp_name'];
$picture_size=$_FILES['picture']['size'];

if($picture_type=="image/jpeg" || $picture_type=="image/jpg" || $picture_type=="image/png" || $picture_type=="image/gif") {
  if($picture_size<=50000000) {
    
    $pic_name=time()."_".$picture_name;
    move_uploaded_file($picture_tmp_name,"images/".$pic_name);
    
     //header('Location: add_product.php')

    $sql = "SELECT post_id FROM post_table WHERE `post_id` = '$post_id' OR `image` = '$pic_name'";
		
    $sql2 = "INSERT INTO `post_table`(`post_id`, `post_title`,`post_keyword`,`category`,`sub_category`,`sub_sub_category`,`post_type`, `image`, `date`, `details`) VALUES ('$post_id','$post_title','$post_keyword','$category','$sub_category','$sub_sub_category','$post_type','$pic_name','$date','$details')";

    $act = $db->query($sql);
    $row = mysqli_num_rows($act);

    if($row >= 1)
    {
      //$_SESSION['error'] = 'This post is already inserted';
      header('Location: add_post.php');
    } 
    else 
    {
      $act2 = $db->query($sql2);
     // $_SESSION['success'] = 'Post add successfully...';
      header('Location: add_post.php');
      #header('Location: register.php');
    }
 
}

}
}
}
//echo $product_id.' '.$product_name.' '.$product_type.' '.$pic_name.' '.$brand .' ' .$price.' '.$quantity.' '.$details.' '.$tags;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Admin Panel</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style/css/bootstrap.min.css" rel="stylesheet">
<link href="style/css/k.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

</head>
<body>
 
   	<?php include("include/header.php");?>
   	<div class="container-fluid">
	  <?php include("include/side_bar.php");?>
    <div class="col-md-9 content" style="margin-left:10px">
  	<div class="panel panel-default">
	<div class="panel-heading" style="background-color:#FFAD4C">
	<h1><span class="glyphicon glyphicon-tag"></span> Add Post  </h1></div><br>
	<div class="panel-body" style="background-color:#E6EEEE;">
		<div class="col-lg-7">
      <div class="well">
        <form action="add_post.php" method="POST" name="form" enctype="multipart/form-data">
        <p>Id</p>
        <input class="input-lg thumbnail form-control" type="text" name="post_id" id="post_id" autofocus style="width:100%" placeholder="Post Id" required >

        <p>Title</p>
        <input class="input-lg thumbnail form-control" type="text" name="post_title" id="post_title" autofocus style="width:100%" placeholder="Post Title" required>

        <p>Description</p>
        <textarea class="thumbnail form-control" name="details" id="details" style="width:100%; height:100px" placeholder="write here..." required></textarea>

        <p>Add Image</p>
        <div style="background-color:#CCC">
            <input type="file" style="width:100%" name="picture" class="btn thumbnail" id="picture" required>
        </div>
      </div>
 

      <div class="col-lg-5">
        <div class="well">
          <h3>Post Information</h3>  
          <p>Post type</p>
          <input type="text" name="post_type" id="post_type" class="form-control" placeholder="Men,Women" required><br>

          <p>Category</p>
          <input type="text" name="category" id="category" class="form-control" placeholder="fashion,cloth etc" required><br>

          <p>Sub-Category</p>
          <input type="text" name="sub_category" id="sub_category" class="form-control" placeholder="Season,Person,Festival" required><br>

          <p>Sub-Sub-Category</p>
          <input type="text" name="sub_sub_category" id="sub_sub_category" class="form-control" placeholder="Male,Winter,Puja" required><br>

          <p>Keyword</p>
          <input type="text" name="post_keyword" id="post_keyword" class="form-control" placeholder="Summer,Winter,Jeans etc">
        </div>          
      </div>

      <div align="center">
        <button type="submit" name="submit" id="submit" class="btn btn-default" style="width:100px; height:60px"> Cancel</button>
        <button type="submit" name="submit" id="submit" class="btn btn-danger" style="width:150px; height:60px"> Add Post</button>
      </div>
    </form>
 
	</div>
</div></div></div>

<?php 

    if(isset($_SESSION['error'])){
      echo '<li>'. $_SESSION['error'] . '</li>';
    }
    else
    {
      echo '<li>' . $_SESSION['success'] . '</li>';
    }

?>


</body>
</html>