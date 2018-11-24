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
			

			?>

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
