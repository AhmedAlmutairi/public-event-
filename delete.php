<!DOCTYPE html>
<html>
<head>
	<title>Patient Details</title>
</head>
<body>

	<?php 

		include('db.php');
		$id = (int)$_GET['id'];
		//$conf= htmlspecialchars($_POST['conf']);
		//echo $conf;
		
			$sql = 'DELETE FROM events WHERE id = "'.$id.'"';
			$delete = mysqli_prepare($d, $sql);
			mysqli_stmt_execute($delete);
			header("location: index.php");
		

	 ?>

	 

</body>
</html>