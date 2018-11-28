<?php 

	include('events.php');
	$e = new events;
	$e->setId($_REQUEST['id']);
	$e->setLat($_REQUEST['lat']);
	$e->setLng($_REQUEST['lng']);
	//echo $_REQUEST['id'];
	//echo $_REQUEST['lat'];
	//echo $_REQUEST['lng'];
	$stus = $e->addLtLgToDB();
	if($stus == true){
		echo "Updated!!";
	}else{
		echo "Not Updated";
	}

 ?>