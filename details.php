<?php include('db.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Event Details</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<header class="heade">
		<nav>
			<div class="mydiv">
				<a href="index.php" class="btn" type="button">Home</a>
				<a href="register.php" class="btn" type="button">Register</a>
				<a href="login.php" class="btn" type="button">Login</a>
			</div>
			<?php 
  				session_start(); 
  				include("db.php");
  			?>
  				<?php if (!isset($_SESSION['username'])) : ?>

  					
					<a href="login.php" class="lon" type="button" style="color: #FFF8DC">Login</a> <span style="color: #FFF8DC"> OR </span> <a href="register.php" class="lon" type="button" style="color: #FFF8DC">Register</a>					
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
	<h1></h1>
	<?php 
		$idd = (int)$_GET['id'];

		echo '<a href="edit.php?id='.$idd.'" role="button" class="btn bttt"> Edit Event </a>';


	 ?>
	 <a href="index.php" role="button" class="btn"> << Back</a>
	
	<table class="tbl">

	<?php 
		
		$id = (int)$_GET['id'];
		$sql = 'SELECT * FROM events WHERE id = "'.$id.'"';
		$data = $d->query($sql);
	
			$row = $data->fetch_assoc();
			echo '<tr>';
			echo '<td id = "celll" class="cl">'. 'Title' . '</td>';
			echo '<td id = "celll">'. $row['title']. '</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td id = "celll" class="cl">'. 'Organization' . '</td>';
			echo '<td id = "celll">'. $row['org']. '</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td id = "celll" class="cl">'. 'Category' . '</td>';
			echo '<td id = "celll">'. $row['category']. '</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td id = "celll" class="cl">'. 'Description' . '</td>';
			echo '<td id = "celll">'. $row['description']. '</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td id = "celll" class="cl">'. 'Date/Time' . '</td>';
			echo '<td id = "celll">'. $row['datetime1']. '</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td id = "celll" class="cl">'. 'Address' . '</td>';
			echo '<td id = "celll">'. $row['street']. '</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td id = "celll" class="cl">'. 'City' . '</td>';
			echo '<td id = "celll">'. $row['city']. '</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td id = "celll" class="cl">'. 'Zip Code' . '</td>';
			echo '<td id = "celll">'. $row['zipCode']. '</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td id = "celll" class="cl">'. 'Country' . '</td>';
			echo '<td id = "celll">'. $row['country']. '</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td id = "celll" class="cl">'. 'Phone' . '</td>';
			echo '<td id = "celll">'. $row['phone']. '</td>';
			echo '</tr>';
			echo '<tr>';
			echo '<td id = "celll" class="cl">'. 'Email' . '</td>';
			echo '<td id = "celll">'. $row['email']. '</td>';
			echo '</tr>';



	 ?>
	</table>

</body>
</html>