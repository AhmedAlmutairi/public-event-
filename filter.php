	<head>
		<script type="text/javascript" src="googleGetOneLocation.js"></script>
	</head>
	<?php 
			
		$category = $_POST['category'];
			
		include('db.php');
		$sql = 'SELECT * FROM events WHERE category = "'.$category.'" ';
		$data = $d->query($sql);

		include('events.php');
		$e = new events;
		$one = $e->getFilterEvent($category);
		$one = json_encode($one, true);
		echo '<div id="filterlocation" style="display: none;">' . $one . '</div>';
	?>

	<div >	
		<div id="mapfilter" style="position: absolute; left: 4%; width: 90%; height: 400px; border: 2px solid;">
		
		</div>
	</div>

<div id="tbpos" style="padding-top: 420px;">	
		<table class="mytable">
	
           <tr>
             <th>Title</th>
             <th>Organization</th>
             <th>Category</th>
             <th>Date/Time</th>
             <th>City</th>
           </tr>

           <?php
			
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

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApmgbzLQcbmUzRKWNgO_aVD0K_mXAyfUI&callback=gMap4"
        async defer></script>
