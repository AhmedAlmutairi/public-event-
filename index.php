<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript" src="googleMap.js"></script>
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

  					
					<a href="login.php" class="lon" type="button" style="color: #FFF8DC">Login</a> <span style="color: #FFF8DC"> OR </span> 
					<a href="register.php" class="lon" type="button" style="color: #FFF8DC">Register</a>					
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
	<div id="radbox" style="position: absolute; left: 43%; padding-top: 20px;">
		<input type="radio" name="by" value="title" checked> Title 
		<input type="radio" name="by" value="zipCode"> Zip Code 
		<input type="radio" name="by" value="city"> City
	</div>
	<div id="m" style="padding-top: 34px;">
		<a href="create.php" class="btn bttt">Add new Event</a>

		<select id = "category" name="category" class="in" onchange="filter(this.value)">
        	<option value="">Select a category:</option>
        	<option value="Social">Social</option>
        	<option value="Educational">Educational</option>
        	<option value="Sport">Sport</option>
        	<option value="Party">Party</option>
      	</select>
  
      	<input type="text" name="search" id="search">
		<button class="btn" onClick="search()">Search</button>
		<button class="btn" id="showMap">Show Map</button>
	</div>

	<div>
			<?php 

				include('events.php');
				$e = new events;
				$v = $e->getEvents();
				$v = json_encode($v, true);
				echo '<div id="location" style="display: none;">' . $v . '</div>';


				$ev = $e->getEventsMarked();
				$ev = json_encode($ev, true);
				echo '<div id="evlocation" style="display: none;">' . $ev . '</div>';

			 ?>	
			<div id="map">

			</div>

	</div>

		
           <div id="result">

           </div>

	<div id="tb">
	<table class="mytable">
	
           <tr>
             <th>Title</th>
             <th>Organization</th>
             <th>Category</th>
             <th>Date/Time</th>
             <th>City</th>
           </tr>

	<?php 
		session_start();
		include('db.php');
		$sql = 'SELECT * FROM events';
		$data = $d->query($sql);
			
			while($row = $data->fetch_assoc()){
			$id = $row['id'];
			echo '<tr id="ro">';
			echo '<td id="cell">'.'<a href="details.php?id='.$id.'" >'. $row['title'] .'</a>' .'</td>';
			echo '<td id="cell">'. $row['org'] . '</td>';
			echo '<td id="cell">'. $row['category'] . '</td>';
			echo '<td id="cell">'. $row['datetime1'] . '</td>';
			echo '<td id="cell">'. $row['city'] . '</td>';
			echo '</tr>';

		}

	 ?>
	</table>	
</div>


	<script type="text/javascript">
		function filter(e){
			var category = e;
			if (category == "") {
				$('#tb').css("display", "block");
				$('#result').css("display", "none");
				return;
			}else{
			$.ajax({
				type: "POST",
        		url: "filter.php",
        		data: {category: category},
				success: function(data){
					//alert(data);
        			$('#result').css("display", "block");
        			$('#tb').css("display", "none");
        			$('#result').html(data); 
    			}	  
			});}
		}


		function search(){
			var s = document.getElementById('search').value;
			var by = document.querySelector('input[name = "by"]:checked').value;
			//alert(by);
			$.ajax({
				type: "POST", 
				url: "search.php",
				data: {s: s, by: by },
				success: function(data){
        			//alert(data);
        			$('#tb').css("display", "none");
        			$('#result').css("display", "block");
        			$('#result').html(data); 
    			}	  

			});
		}

		$('#map').hide();

		$('#showMap').click(function(){
			//$('#map').toggle();
			//$('#tb').css("padding-top", "430px");
			if($('#map').css('display') == "none"){
				$('#map').show();
				$('#tb').css("padding-top", "430px");
			}else{
				$('#map').hide();
				$('#tb').css("padding-top", "0px");
			}
		});



	</script>
	
</body>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApmgbzLQcbmUzRKWNgO_aVD0K_mXAyfUI&callback=gMap"
        async defer></script>




</html>