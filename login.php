<?php include('db.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
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
if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($d, $_POST['username']);
  $password = mysqli_real_escape_string($d, $_POST['password']);

  if (empty($username)) {
    echo '<script type="text/javascript">alert("username is required");</script>';
  }
  if (empty($password)) {
    echo '<script type="text/javascript">alert("password is required");</script>';
  }

  if (count($errors) == 0) {
    $pass = md5($password);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$pass'";
    $results = mysqli_query($d, $query);
    $row=mysqli_fetch_assoc($results);
    if (mysqli_num_rows($results) == 1) {
      session_start();
      $_SESSION['username'] = $username;
      $_SESSION['id']= $row['id'];
      header('location: index.php');
    }else {
      echo '<script type="text/javascript">alert("username or password is wrong");</script>';
    }
  }
}

?>


<form method="post" action="login.php" class="mylogin">
	
  <div class="lo">
    <h1>Login</h1>
  </div>

	<div class="input-group">
    <label>Username</label></br>
      <input type="text" class="in" name="username" value="<?php echo $username; ?>">
  </div>

  	<div class="input-group">
  	  <label>Password</label></br>
  	  <input type="password" class="in" name="password" value="<?php echo $password; ?>">
  	</div>

  	<div class="input-group">
  	  <button type="submit" class="btn" name="login">Login</button>
      <a href="index.php" role="button" class="btn">Cancel</a>
  	</div>
    <p>If you have no accout <a href="register.php">Register here</a></p>

</form>
 
</body>

<footer style="clear: both; position: relative; height: 40px; margin-top: 1050px; width: 100%;">
  <?php include("footer.php"); ?>
</footer>

</html>