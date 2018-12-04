<!DOCTYPE html>
<html>
<head>
	<title>About us</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript" src="googleMap.js"></script>
	<header class="heade">
		<nav>
			<div class="mydiv">
				<a href="index.php" class="btn" type="button">Home</a>
				<a href="about.php" class="btn" type="button">About us</a>
			</div>
			<?php 
  				session_start(); 
  				include("db.php");
  			?>
  				<?php if (!isset($_SESSION['username'])) : ?>

  					
					<a href="login.php" class="lon" type="button" style="color: #FFF8DC">Login</a> <span style="color: #FFF8DC"> OR </span> 
					<a href="register.php" class="lon" type="button" style="color: #FFF8DC">Register</a>					
  				<?php endif ?>



  					<!--//$_SESSION['msg'] = "You must log in first";
  					//header('location: login.php');

  					echo '<div class = "lon"><a href="login.php">login</a> OR <a href="register.php">Register</a>';
  					//echo "OR";
  					//echo '<a href="register.php">Register</a>';-->
  			<?php
  				if (isset($_GET['logout'])) {
  					session_destroy();
  					unset($_SESSION['username']);
  					header("location: login.php");
  				}
			?>

  			<?php if (isset($_SESSION['success'])) : ?>
      		<h3>
          	<?php 
          		echo $_SESSION['success']; 
          		unset($_SESSION['success']);
          	?>
      		</h3>
  			<?php endif ?>

    	<?php  if (isset($_SESSION['username'])) : ?>
    		<span style="color: #FFF8DC"> Hi <strong><?php echo $_SESSION['username']; ?></strong></span></br>
    		<a href="index.php?logout='1'" type="button" style="color: #FFF8DC">logout</a>
    	<?php endif ?>

	
		</nav>
	

	</header>
</head>
<body>
	<h1>Public Event</h1>
	<p>Public Event is a web app for those who desire to declare, publish, or make a public invitation for their events. Moreover, those who are seeking events can find what they are looking for by browsing, search, and filter events to find the event they are looking for. Our web app provides features for users to make it easy for them to find their desired events. Some of those features are searching by title, zip Code, or city, filter events by categories, and show a map for events' locations. We also, in our web app, provide friendly user interface and very good lauout look.</p>
	
	
</body>




<footer style="clear: both; position: relative; height: 40px; margin-top: 500px; width: 100%;">
	<?php include("footer.php"); ?>
</footer>

</html>