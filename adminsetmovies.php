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
 
 <html>

<body background="eikones/movies.jpg">
 <table  border="1">
 <tr>
   <th>Movie id</th> 
   <th></th>
   <th>Movie Name</th> 
   <th>Description</th>
   <th>Release year</th>
   <th>Director</th>
   <th>Cast</th>
   <th>Genre</th>
   <th>Rating</th>
   <th>Comments</th>
   <th>Duration</th> 
 </tr>
 
<?php

    //If the admin pressed to check the movies list.
	if (isset($_POST['movieslist']))
	{
		//Create a connection with the database.
		$link = mysqli_connect(" ", " ", " ", " ");
		//Check if the connection failed. If it did, show error message.
		if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
		} 
		
		//Check if there are any movies in the movies table.
		$query= "SELECT * FROM movies";
		$result = mysqli_query($link,$query);
		//If there are, fetch each movie's data.
		if ($result->num_rows > 0) {
			
			// Output data of each row.
			while($row = $result->fetch_assoc()) {
				echo "<tr>";
				echo "<td>" . $row["id"] . "</td>";
				echo "<td>"	?><img src="<?php echo $row["image"];?>" height="300" width="250" />
				<?php "</td>";
				echo "<td>" . $row["movie_name"]. "</td>";
				echo "<td>" . $row["description"]. "</td>";
				echo "<td>" .$row["releaseyear"]. "</td>";
				echo "<td>" .$row["director"]. "</td>";
				echo "<td>" .$row["cast"]. "</td>";
				echo "<td>" .$row["genre"]. "</td>";
				echo "<td>" .$row["rating"]. "</td>";
				echo "<td>" .$row["comments"]. "</td>";
				echo "<td>" .$row["duration"]. "</td>";
				
				echo "</tr>";
			}
			echo "</table>";
		} 
		//Else show 0 results message.
		else{ 
			echo "0 results"; 
		}
		$link->close();
	}

	//If the admin pressed to add a movie, open the cmovies.php file.
	else if (isset($_POST['addmovies']))
	{
		header("location: cmovies.php");
	}

	//If the admin pressed to delete a movie, open the dmovies.php file.
	else if (isset($_POST['deletemovies']))
	{	
		header("location: dmovies.php");
			
	}
	//If the admin pressed to update a movie's data, open the update_movies.php file.
	else if (isset($_POST['updatemovies']))
	{
		header("location: update_movies.php");
	}
	else{
			echo"failure";
		}	
?>
</table>
</body>
</html>
