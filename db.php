<?php 

session_start();

$username = "";
$name = "";
$organization = "";
$email = "";
$password = "";
$password1 = "";

$d = mysqli_connect('localhost', 'root', 'root', 'publicEvent');

if (isset($_POST['register'])) {
  $username = mysqli_real_escape_string($d, $_POST['username']);
  $name = mysqli_real_escape_string($d, $_POST['fullname']);
  $organization = mysqli_real_escape_string($d, $_POST['organization']);
  $email = mysqli_real_escape_string($d, $_POST['email']);
  $password = mysqli_real_escape_string($d, $_POST['password']);
  $password1 = mysqli_real_escape_string($d, $_POST['password1']);
  
  
$post = array('username', 'fullname', 'email', 'password', 'password1');

$err = false;
$passErr = false;
foreach($post as $v) {
  if (empty($_POST[$v])) {
    $err = true;
  }
}

if ($password != $password1) {
    $passErr = true;
}


if ($err) {
  echo '<script type="text/javascript">alert("Fields (username, name, email, password) cannot be empty");</script>';
}else if($passErr){
  echo '<script type="text/javascript">alert("passwords not the same");</script>';
} else {
      $pass = md5($password);
    	$query = "INSERT INTO users (username, name, organization, email, password) 
  			  VALUES('$username', '$name', '$email', '$organization', '$pass')";
  	mysqli_query($d, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header("location: index.php");

  }	
  
}


