<?php include('db.php') ?>


<!DOCTYPE html>
<html>
<head>
	<title>Create Event</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <link href="jquery.datetimepicker.css" rel="stylesheet">

    
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

            
              <a href="login.php" class="lon" type="button" style="color: #FFF8DC">Login</a> OR <a href="register.php" class="lon" type="button" style="color: #FFF8DC">Register</a>
            
          

            <?php 

              $_SESSION['msg'] = "You must log in first";
              header('location: login.php');
            ?>

            
        <?php endif ?>
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


      if(isset($_POST['AddEvent'])){
        $title = mysqli_real_escape_string($d, $_POST['title']);
        $orgname = mysqli_real_escape_string($d, $_POST['org']);
        $category = mysqli_real_escape_string($d, $_POST['category']);
        $date = mysqli_real_escape_string($d, $_POST['datetime']);
        $description = mysqli_real_escape_string($d, $_POST['description']);
        $address = mysqli_real_escape_string($d, $_POST['address']);
        $city = mysqli_real_escape_string($d, $_POST['city']);
        $zipcode = mysqli_real_escape_string($d, $_POST['zipcode']);
        $country = mysqli_real_escape_string($d, $_POST['country']);
        $email = mysqli_real_escape_string($d, $_POST['email']);
        $phone = mysqli_real_escape_string($d, $_POST['phone']);

        $user_id = $_SESSION['id']; 

  
        $post = array('title', 'org', 'category', 'datetime', 'description', 'address', 'city', 'zipcode', 'country');

        $err = false;
        foreach($post as $v) {
          if (empty($_POST[$v])) {
            $err = true;
          }
        }

        if ($err) {
            echo '<script type="text/javascript">alert("Fields with * are required");</script>';
        } else {
            $query = "INSERT INTO events (user_id, title, org, description, phone, street, city, zipCode, country, email, datetime1, category) 
              VALUES('$user_id', '$title', '$orgname', '$description', '$phone', '$address', '$city', '$zipcode', '$country', '$email', '$date', '$category')";
            mysqli_query($d, $query);
            header("location: index.php");

        } 
  
    }


   ?>

  


<form method="post" action="create.php" class="mycreate">

  <div class="crt">
    <h1 id="hs">Add an Event <?php echo $user_id ?> </h1>
  </div>
	
	<div class="input-group">
  	  <label> Title </label></br>
  	  <input type="text" class="in" name="title" >
  	</div>

  	<div class="input-group">
  	  <label> Org. Name </label></br>
  	  <input type="text" class="in" name="org">
  	</div>

    <div class="input-group">
      <label>Event Category</label></br>
      <select name="category" class="in">
        <option value="">Select a category:</option>
        <option value="Social">Social</option>
        <option value="Educational">Educational</option>
        <option value="Sport">Sport</option>
        <option value="Party">Party</option>
      </select>
    </div>

    <div class="input-group">
      <label>Event Date and Time</label></br>
      <input type="text" name = "datetime" id="datepicker" class="in">
  </div>

    <div class="input-group">
      <label>Description</label></br>
      <textarea type="text" class="inx" name="description" value="<?php echo $history; ?>"></textarea>
    </div>

  	<div class="input-group">
  	  <label>Address</label></br>
  	  <textarea type="text" class="inx" name="address" value="<?php echo $address; ?>"></textarea>
  	</div>

    <div class="input-group">
      <label> City </label></br>
      <input type="text" class="in" name="city" value="<?php echo $age; ?>">
    </div>

    <div class="input-group">
      <label>Zip Code</label></br>
      <input type="number" class="in" name="zipcode" value="<?php echo $sex; ?>">
    </div>

    <div class="input-group">
      <label> Country </label></br>
      <input type="text" class="in" name="country" value="<?php echo $age; ?>">
    </div>

    <div class="input-group">
      <label>Phone</label></br>
      <input type="number" class="in" name="phone" value="<?php echo $sex; ?>">
    </div>

    <div class="input-group">
      <label>Email</label></br>
      <input type="email" class="in" name="email" value="<?php echo $sex; ?>">
    </div>

  	<div class="input-group">
  	  <button type="submit" class="btn" name="AddEvent">Add</button>
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
</html>