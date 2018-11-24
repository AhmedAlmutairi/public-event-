<?php 
			
			$category = $_POST['category'];
			
			include('db.php');
			$sql = 'SELECT * FROM events WHERE category = "'.$category.'" ';
			$data = $d->query($sql);
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
