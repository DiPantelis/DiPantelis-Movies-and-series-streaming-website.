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

	<body background="eikones/movies.jpg">
		<div align="Center" >
			<form action="update_tainia.php" method="POST">		
					 
				<font color="white"> <h1> Εισάγετε το id της ταινίας, της οποίας τα στοιχεία θέλετε να ενημερώσετε  : </h1> </font>
				<font size=4 color="white"> <strong></strong> Id ταινίας: </font> <input type="text" name="movieid" required="required" ><p>
				<font color="white"> <h1> Επιλέξτε το πεδίο που θέλετε να αλλάξετε και κατόπιν εισάγετε την νέα του τιμή </h1> </font>
				<select name="choice2">
														
									<option value="id">id</option> 
									<option value="imageurl">image url</option> 
									<option value="moviename">movie name</option> 
									<option value="description">description</option> 
									<option value="releaseyear">release year</option> 
									<option value="director">director</option> 
									<option value="cast">cast</option> 
									<option value="genre">genre</option>   				  	
									<option value="rating">rating</option> 
									<option value="comments">comments</option> 
									<option value="duration">duration</option> 

				</select>
				<font size=4 > <strong></strong></font> <input type="text" name="updatevalue" required="required" ><p>
				<input type="submit" value=" Επιλογή">

			</form>
		</div>

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

			//Creates a connection with the database.
			$link = mysqli_connect(" ", " ", " ", " ");
			//Checks if the connection failed. If it did, show error message.
			if($link === false){
				die("ERROR: Could not connect. " . mysqli_connect_error());
			} 
			
			//Get all records of the movies from the movies table.
			$sql = "SELECT * FROM movies";
			$result = $link->query($sql);
			if ($result->num_rows > 0) {
				//Output data of each row.
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
			else{ 
				echo "0 results"; 
			}
			$link->close();
		?>
		</table>
	</body>
</html>

