
<head>
	<script type="text/javascript" src="googleGetOneLocation.js"></script>
</head>

<?php 
			
			$s = $_POST['s'];
			$by = $_POST['by'];
			
			include('db.php');
			if($by === 'zipCode'){
				$sql = 'SELECT * FROM events WHERE zipCode = "'.$s.'" ';
				$data = $d->query($sql);
			}elseif ($by === 'title') {
				$sql = 'SELECT * FROM events WHERE title = "'.$s.'" ';
				$data = $d->query($sql);
			}elseif ($by === 'city') {
				$sql = 'SELECT * FROM events WHERE city = "'.$s.'" ';
				$data = $d->query($sql);
			}
				include('events.php');
				$e = new events;
				$one = $e->getSearchEvent($s, $by);
				$one = json_encode($one, true);
			

				echo '<div id="searchlocation" style="display: none;">' . $one . '</div>';

			?>

		<div >
			
			<div id="mapsearch" style="position: absolute; left: 4%; width: 90%; height: 400px; border: 2px solid;">
			
				
			</div>
		</div>
		<div id="tbpos" style="padding-top: 420px;">
		<table class="mytable" >
	
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


	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApmgbzLQcbmUzRKWNgO_aVD0K_mXAyfUI&callback=gMap3"
        async defer></script>


