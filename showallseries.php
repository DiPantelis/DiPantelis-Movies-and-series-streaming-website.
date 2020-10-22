 <html>
	<style>
	 
		table {
			width: 100%;
			color: white;
			font-family: monospace;
			font-size: 20px;
			text-align: center;
			border-collapse: separate;
			border-spacing: 1px;
		} 

		th {	  
			background-color:  #323030;
			color: white;
		}
		
		table tr:nth-child(odd) td{
			background-color: rgba(0, 0, 0, 0.8);
			color: white;
		}
		
		table tr:nth-child(even) td{
			background-color: rgba(66, 187, 191, 0.85);
			color: white;
		}
		
		img
		{
			width: 280px;
			height: 380px;
		}
		
	 </style>
 

	<body background="eikones/cinema2.jpg">

	<?php
		//Gets the user's id.
		if (isset($_GET['id'])) {
			$userid=$_GET['id'];
		}
		//Creates a connection with the database.
		$link = mysqli_connect(" ", " ", " ", " ");
		//Checks if the connection failed. If it did, show error message.
		if($link === false){
			die("ERROR: Could not connect. " . mysqli_connect_error());
		} 
		
	?>

		
		<table  border="1">
		<tr>
		<th>Series id</th> 
		<th>Series Poster</th>
		<th>Series Name</th> 
		<th>Number of seasons</th>
		<th>Number of episodes</th> 
		<th>Description</th>
		<th>Release year</th>
		<th>Director</th>
		<th>Cast</th>
		<th>Genre</th>
		<th>Rating</th>
		<th>Rate it!</th>
		<th>Comments</th>
		<th>add a comment:</th>
		<th>Average episode duration</th>
		<th>Play!</th> 
		<th>Add to favorite list</th>
	   <th>Add to watchlist</th>
		</tr>
			
	<?php		
		//Get all records of the series from the series table.
		$sql = "SELECT * FROM series";
		$result = $link->query($sql);
		if ($result->num_rows > 0) {
		//Output data of each row.
			while($row = $result->fetch_assoc()) {
				echo "<tr>";
				echo "<td>" . $row["id"] . "</td>";
				echo "<td>"	?><img src="<?php echo $row["image"];?>" height="300" width="250" />
				<?php "</td>";
				echo "<td>" . $row["series_name"]. "</td>";
				echo "<td>" .$row["num_of_seasons"]. "</td>";
				echo "<td>" .$row["num_of_episodes"]. "</td>";
				echo "<td>" . $row["description"]. "</td>";
				echo "<td>" .$row["releaseyear"]. "</td>";
				echo "<td>" .$row["director"]. "</td>";
				echo "<td>" .$row["cast"]. "</td>";
				echo "<td>" .$row["genre"]. "</td>";
				echo "<td>" .$row["rating"]. "</td>";?>
				<td>
					<form action="rateseries.php?id=<?php echo $userid ?>&msid=<?php echo $row["id"] ?>" method="POST">		
				   
						<select name="va8mos">
								<option value="1">1</option>   				  	
								<option value="2">2</option>  
								<option value="3">3</option>   				  	
								<option value="4">4</option>   
								<option value="5">5</option>   				  	
								<option value="6">6</option>  
								<option value="7">7</option>   				  	
								<option value="8">8</option>  	
								<option value="9">9</option>   				  	
								<option value="10">10</option>  								
						</select>
						 <input type="submit" value="Βαθμολόγισε το!"> 
					</form >		
				</td><?php
				echo "<td>" .$row["comments"]. "</td>"; ?>
				<td><form  method="post"action="addcommentsseries.php?id=<?php echo $userid ?>&msid=<?php echo $row["id"]  ?>" method="POST">
				<p>
					<textarea cols="10"  rows="10" <input type="text"   style="width:400px; height:160px;"  name="comments"  id="commentsid" value="" /> 
				
					</textarea>
				</p>
					<input type="submit" value="Υποβολή σχολίου">
				</form></td><?php
				echo "<td>" .$row["duration"]. "</td>";?>
				
				<td><form action="playseries.php?msid=<?php echo $row["id"]  ?>" method="POST">
				<input type="image" src="eikones/play.png" name="<?php echo $row["id"];?>" alt="Submit" width="68" height="48">
				</form></td>
				<td><form action="addtofavelistseries.php?id=<?php echo $userid ?>&msid=<?php echo $row["id"]  ?>" method="POST">
				<input type="image" src="eikones/add.png" name="<?php echo $row["id"];?>" alt="Submit" width="48" height="48">
				</form></td>
				<td><form action="addseriestowatchlist.php?id=<?php echo $userid ?>&msid=<?php echo $row["id"]  ?>" method="POST">
				<input type="image" src="eikones/add.png" name="<?php echo $row["id"];?>" alt="Submit" width="48" height="48">
				</form></td>
				<?php
				echo "</tr>";
			}
			echo "</table>";
		} 
		else{ 
			echo "0 results"; 
		}
		$link->close();
		?>
		</table>
	</body>
</html>