<?php include('db.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
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

<form method="post" action="register.php" class="myregister">

  <div class="reg">
    <h1>Registeration</h1>
  </div>
	
	<div class="input-group">
    <label>Username</label></br>
      <input type="text" class="in" name="username" value="<?php echo $username; ?>">
    </div>

    <div class="input-group">
  	  <label>Full Name</label></br>
  	  <input type="text" class="in" name="fullname" value="<?php echo $name; ?>">
  	</div>

    <div class="input-group">
      <label>Org. Name</label></br>
      <input type="text" class="in" name="organization" value="<?php echo $organization; ?>">
    </div>

  	<div class="input-group">
  	  <label>Email</label></br>
  	  <input type="email" class="in" name="email" value="<?php echo $email; ?>">
  	</div>

  	<div class="input-group">
  	  <label>Password</label></br>
  	  <input type="password" class="in" name="password" value="<?php echo $password; ?>">
  	</div>

    <div class="input-group">
      <label>Confirm Password</label></br>
      <input type="password" class="in" name="password1" value="<?php echo $password; ?>">
    </div>

  	<div class="input-group">
  	  <button type="submit" class="btn" name="register">Register</button>
      <a href="index.php" role="button" class="btn">Cancel</a>
  	</div>

</form>
 
</body>
</html>