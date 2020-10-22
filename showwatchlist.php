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
		   
			h1  {
				background-color:    #541043   ;
				color: white;
				text-align: center;
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
			
			img	{
				width: 280px;
				height: 380px;
			}
		
	 </style>

	<body background="eikones/cinema2.jpg">
		<h1>  Tαινίες για να παρακολουθήσω αργότερα </h1>
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
			<th>Movie id</th> 
			<th>Movie Poster</th>
			<th>Movie Name</th>	
			<th>Description</th>
			<th>Release year</th>
			<th>Director</th>
			<th>Cast</th>
			<th>Genre</th>
			<th>Rating</th>
			<th>Comments</th>
			<th>Duration</th> 
			<th>Play Movie!</th> 
			<th>Remove from favorites:</th>
			</tr>
		<?php	
			//Get all records of the movies from the watchlist  table for the user with the user's id.
			$sql = "SELECT movieid FROM watchlist WHERE seriesid=0 AND userid='$userid'  ";
			$result = $link->query($sql);
			if ($result->num_rows > 0) {
				//Output data of each row.
				while($row = $result->fetch_assoc()) {	
					$value=$row["movieid"];
					$sql2 = "SELECT * FROM movies where id='$value' ";
					$result2 = $link->query($sql2);
					$row2 = $result2->fetch_assoc();
					echo "<tr>";
					echo "<td>" . $row2["id"] . "</td>";
					echo "<td>"	?><img src="<?php echo $row2["image"];?>" height="300" width="250" />
					<?php "</td>";
					echo "<td>" . $row2["movie_name"]. "</td>";
					echo "<td>" . $row2["description"]. "</td>";
					echo "<td>" .$row2["releaseyear"]. "</td>";
					echo "<td>" .$row2["director"]. "</td>";
					echo "<td>" .$row2["cast"]. "</td>";
					echo "<td>" .$row2["genre"]. "</td>";
					echo "<td>" .$row2["rating"]. "</td>";
					echo "<td>" .$row2["comments"]. "</td>";
					echo "<td>" .$row2["duration"]. "</td>";?>
						
					<td><form action="playmovie.php?msid=<?php echo $row2["id"]  ?>" method="POST">
					<input type="image" src="eikones/play.png" name="<?php echo $row2["id"];?>" alt="Submit" width="68" height="48">
					</form></td>
					<td><form action="removefromwatchlist.php?id=<?php echo $userid ?>&msid=<?php echo $row2["id"] ; ?>" method="POST">
					<input type="image" src="eikones/remove.png" name="<?php echo $row2["id"];?>" alt="Submit" width="48" height="48">
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