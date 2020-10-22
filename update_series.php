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

	<body background="eikones/series.jpg">
	<div align="Center" >
		<form action="update_seira.php" method="POST">		
	  
			<font color="white"> <h1> Εισάγετε το id της σειράς, της οποίας τα στοιχεία θέλετε να ενημερώσετε  : </h1> </font>
			<font size=4 color="white"> <strong></strong> Id σειράς: </font> <input type="text" name="seriesid" required="required" ><p>
			<font color="white"> <h1> Επιλέξτε το πεδίο που θέλετε να αλλάξετε και κατόπιν εισάγετε την νέα του τιμή </h1> </font>
			<select name="choice2">
													
								<option value="id">id</option> 
								<option value="imageurl">image url</option> 
								<option value="seriesname">series name</option> 
								<option value="description">description</option> 
								<option value="releaseyear">release year</option> 
								<option value="director">director</option> 
								<option value="cast">cast</option> 
								<option value="genre">genre</option>   				  	
								<option value="rating">rating</option> 
								<option value="comments">comments</option> 
								<option value="duration">average episode duration</option> 
								<option value="numberofseasons">number of seasons</option> 
								<option value="numberofepisodes">number of episodes</option> 
					
			</select>
			<font size=4 > <strong></strong> </font> <input type="text" name="updatevalue" required="required" ><p>
			<input type="submit" value=" Επιλογή">
		</form>
	</div>
	<table  border="1">
		<tr>
		 <th>Series id</th> 
		 <th></th>
		 <th>Series Name</th> 
		 <th>Number of seasons</th>
		 <th>Number of episodes</th> 
		 <th>Description</th>
		 <th>Release year</th>
		 <th>Director</th>
		 <th>Cast</th>
		 <th>Genre</th>
		 <th>Rating</th>
		 <th>Comments</th>
		 <th>Average episode duration</th>    
		 </tr>
		 
		<?php

			//Creates a connection with the database.
			$link = mysqli_connect(" ", " ", " ", " ");
			//Checks if the connection failed. If it did, show error message.
			if($link === false){
				die("ERROR: Could not connect. " . mysqli_connect_error());
			} 
			
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