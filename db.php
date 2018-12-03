<?php 

session_start();

$username = "";
$name = "";
$organization = "";
$email = "";
$password = "";
$password1 = "";

$d = mysqli_connect('localhost', 'root', 'root', 'publicEvent');



if (isset($_POST['registeration1'])) {
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

$userExist = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
$exist = mysqli_query($d, $userExist);
$user = mysqli_fetch_assoc($exist);
  


if ($err) {
  echo '<script type="text/javascript">alert("Fields (username, name, email, password) cannot be empty");</script>';
}else if($passErr){
  echo '<script type="text/javascript">alert("passwords not matching");</script>';
}if ($user) {
    if ($user['username'] === $username) {
      echo '<script type="text/javascript">alert("username is exist");</script>';;
    }

    if ($user['email'] === $email) {
      echo '<script type="text/javascript">alert("email is exist");</script>';;
    }
  } else {
      $pass = md5($password);
    	$query = "INSERT INTO users (username, name, organization, email, password) 
  			  VALUES('$username', '$name', '$organization', '$email', '$pass')";
  	mysqli_query($d, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header("location: index.php");

  }	
  
}


