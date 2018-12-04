<?php include('db.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  	<link href="jquery.datetimepicker.css" rel="stylesheet">
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

<?php 

	$title = "";
    $orgname = "";
    $category = "";
    $date = "";
    $description = "";
    $address = "";
    $city = "";
    $zipcode = "";
    $country = "";
    $phone = "";
    $email = "";

    if($d === false){
   			 die("ERROR: Could not connect. " . mysqli_connect_error());
	}
 
	$id = (int)$_GET['id'];
	$sql = 'SELECT * FROM events WHERE id = "'.$id.'"';
	$data = $d->query($sql);
	$row = $data->fetch_assoc();
	$title = $row['title'];
	$orgname = $row['org'];
	$category = $row['category'];
	$date = $row['datetime1'];
	$description = $row['description'];
	$address = $row['street'];
	$city = $row['city'];
	$zipcode = $row['zipCode'];
	$country = $row['country'];
	$phone = $row['phone'];
	$email = $row['email'];



	if (isset($_POST['saveEdit'])) {
		$id = mysqli_real_escape_string($d, $_POST['id']);
  		$title = mysqli_real_escape_string($d, $_POST['title']);
  		$orgname = mysqli_real_escape_string($d, $_POST['org']);
  		$category = mysqli_real_escape_string($d, $_POST['category']);
		$date = mysqli_real_escape_string($d, $_POST['datetime1']);
		$description = mysqli_real_escape_string($d, $_POST['description']);
		$address = mysqli_real_escape_string($d, $_POST['street']);
		$city = mysqli_real_escape_string($d, $_POST['city']);
		$zipcode = mysqli_real_escape_string($d, $_POST['zipCode']);
		$country = mysqli_real_escape_string($d, $_POST['country']);
		$phone = mysqli_real_escape_string($d, $_POST['phone']);
		$email = mysqli_real_escape_string($d, $_POST['email']);
		$user_id = $_SESSION['id']; 


        $post = array('title', 'org', 'category', 'datetime1', 'description', 'street', 'city', 'zipCode', 'country');

		$err = false;
		foreach($post as $v) {
  			if (empty($_POST[$v])) {
    			$err = true;
  			}
		}

		if ($err) {
  			echo '<script type="text/javascript">alert("Fields with * are required");</script>';
		}else {
			$query =  "UPDATE events SET user_id = $user_id, title = '$title', org = '$orgname', description = '$description', phone = '$phone', street = '$address', city = '$city', zipCode = '$zipcode', country = '$country', email = '$email', datetime1 = '$date', category = '$category' WHERE id = $id";
		  			  
			//mysqli_query($d, $query);
            //header("location: index.php");

            if(mysqli_query($d, $query)){
    				echo '<script type="text/javascript">alert("Event is updated");</script>';
    				header("location: index.php");
			} else {
    				echo "ERROR: Could not able to execute $query. " . mysqli_error($d);
			}
		}
	}  	





 ?>


<form method="post" action="edit.php" class="mycreate">

  <div class="crt">
    <h1 id="hs">Edit an Event</h1>
  </div>

  	<div class="input-group">
  	  
  	  <input type="hidden" name="id" value="<?php echo $id; ?>">
  	</div>
	
	<div class="input-group">
  	  <label> Title </label></br>
  	  <input type="text" class="in" name="title" value="<?php echo $title; ?>">
  	</div>

  	<div class="input-group">
  	  <label> Org. Name </label></br>
  	  <input type="text" class="in" name="org" value="<?php echo $orgname; ?>">
  	</div>

    <div class="input-group">
      <label>Event Category</label></br>
      <select name="category" class="in" value="<?php echo $category; ?>">
        <option value="<?php echo $category; ?>"><?php echo $category; ?></option>
        <option value="Social">Social</option>
        <option value="Educational">Educational</option>
        <option value="Sport">Sport</option>
        <option value="Party">Party</option>
      </select>
    </div>

    <div class="input-group">
      <label>Event Date and Time</label></br>
      <input type="text" name = "datetime1" id="datepicker" class="in" value="<?php echo $date; ?>">
  </div>

    <div class="input-group">
      <label>Description</label></br>
      <textarea type="text" class="inx" name="description" value="<?php echo $description; ?>"><?php echo $description; ?></textarea>
    </div>

  	<div class="input-group">
  	  <label>Address</label></br>
  	  <textarea type="text" class="inx" name="street" value="<?php echo $address; ?>"><?php echo $address; ?></textarea>
  	</div>

    <div class="input-group">
      <label> City </label></br>
      <input type="text" class="in" name="city" value="<?php echo $city; ?>">
    </div>

    <div class="input-group">
      <label>Zip Code</label></br>
      <input type="number" class="in" name="zipCode" value="<?php echo $zipcode; ?>">
    </div>

    <div class="input-group">
      <label> Country </label></br>
      <input type="text" class="in" name="country" value="<?php echo $country; ?>">
    </div>

    <div class="input-group">
      <label>Phone</label></br>
      <input type="number" class="in" name="phone" value="<?php echo $phone; ?>">
    </div>

    <div class="input-group">
      <label>Email</label></br>
      <input type="email" class="in" name="email" value="<?php echo $email; ?>">
    </div>

  	<div class="input-group">
  	  <button type="submit" class="btn" name="saveEdit">Save</button>
      <a href="index.php" role="button" class="btn">Cancel</a>
  	</div>

</form>

       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min"></script>
    <script src="jquery.datetimepicker.full.js"></script>
    <script>
      $('#datepicker').datetimepicker();
    </script>     






</body>



<footer style="clear: both; position: relative; height: 40px; margin-top: 1050px; width: 100%;">
  <?php include("footer.php"); ?>
</footer>
</html>