<!DOCTYPE html>
<html>
<head>
	<title>Patient Details</title>
</head>
<body>

	<form id="myForm" action="delete.php" method="post">
        <input type="hidden" id="conf" name="conf">
	</form>

	<?php 

		include('db.php');
		$id = (int)$_GET['id'];
		$conf= htmlspecialchars($_POST['conf']);
		echo $conf;
			$sql = 'DELETE FROM events WHERE id = "'.$id.'"';
			$delete = mysqli_prepare($d, $sql);
			mysqli_stmt_execute($delete);
			header("location: index.php");
		
        

	 ?>

	 <script>
		var conf = confirm("are you sure want to delete this event?");
		document.getElementById("conf").value = jsChoose;
		document.getElementById("myForm").submit();
	</script>

</body>
</html>