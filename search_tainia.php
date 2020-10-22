<html>
	 <style>
	 
		table {
			border-collapse: collapse;
			width: 100%;
			color: white;
			font-family: monospace;
			font-size: 25px;
			text-align: left;
		} 
		
		th {
			background-color:  #323030;
			color: white;
		}
		
		table tr:nth-child(odd) td{
			background-color:  #323030;
			color: white;
		}
		
		table tr:nth-child(even) td{
			background-color:   #42bbbf  ;
			color: white;
		}
		
		img
		{
			width: 420px;
			height: 380px;
		}
		
		fieldset {
			background-color:    #541043   ;
			color: white;
		}
		
	 </style>

	<body background="eikones/cinema2.jpg">

	<?php
		
		//Get the type of the parameter that the user will choose to search movies from the database.Example: date of release, name, id etc.
		if (isset($_POST['choice2']))
		{
			$searchtype=$_POST['choice2'];
		}	
		//Get the value  of the parameter that the user will choose to search series according to it.
		if (isset($_POST['searchvalue']))
		{
			$searchvalue=$_POST['searchvalue'];

		}
		//Create a connection with the database.
		$link = mysqli_connect(" ", " ", " ", " ");
		//Check if the connection failed. If it did, show error message.
		if($link === false){
			die("ERROR: Could not connect. " . mysqli_connect_error());
		}

		//Check if the type of parameter is the movie's name or part of the name and then find the movies with that names, in the database.
		if($searchtype=="moviename")
		{	
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
			</tr>
		
	<?php	
			//Check if there is the parameter's value inside of the name of any movies on the novies table. 
			$searchvalue2 = explode(" ", $_POST['searchvalue']);
			$query ="SELECT * FROM movies WHERE movie_name like '%" . $searchvalue2[0] . "%'";
			  
			for($i = 1; $i < count($searchvalue2); $i++) {
				if(!empty($searchvalue2[$i])) {
					$query .= " OR moviename like '%" . $searchvalue2[$i] . "%'";
				}
			}
			 
			$result = $link->query($query);
			echo "<br>You have searched for searchvalues: " . $_POST['searchvalue'];
			
			//If there were matches, show the series list to the user.			
			if(mysqli_num_rows($result) > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<tr >";
					echo "<td >" . $row["id"] . "</td>";
					echo "<td >"	?><img src="<?php echo $row["image"];?>" height="300" width="250" />
					<?php "</td>";
					echo "<td >" . $row["movie_name"]. "</td>";
					echo "<td >" . $row["description"]. "</td>";
					echo "<td >" .$row["releaseyear"]. "</td>";
					echo "<td >" .$row["director"]. "</td>";
					echo "<td >" .$row["cast"]. "</td>";
					echo "<td '>" .$row["genre"]. "</td>";
					echo "<td >" .$row["rating"]. "</td>";
					echo "<td >" .$row["comments"]. "</td>";
					echo "<td >" .$row["duration"]. "</td>";	
					echo "</tr>";
				}
				echo "</table>";
			} 
			//Otherwise show 0 results message.
			else{ 
				echo "0 results"; 
			}
			$link->close();	
		}

		//Check if the type of parameter is the movie's year of release then find the movies that were released that year , in the database.	
		if($searchtype=="releaseyear")
		{	
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
	   
			</tr>
		
			<?php	
			$count=0;
			$searchvalue2=intval($searchvalue);
			if($searchvalue2==0){
				$searchvalue2='a';
			}
			if((!is_int($searchvalue2))||($searchvalue2 >2019)||($searchvalue2 <1900)){
				 echo "wrong input type on field release_year please go back and correct it    | ";
				 $count++;
			}
			
			if($count==0){
				$sql = "SELECT * FROM movies WHERE releaseyear ='$searchvalue2' ";
				$result = $link->query($sql);
				if(mysqli_num_rows($result) > 0) {
					while($row = $result->fetch_assoc()) {
						echo "<tr >";
						echo "<td >" . $row["id"] . "</td>";
						echo "<td >"	?><img src="<?php echo $row["image"];?>" height="300" width="250" />
						<?php "</td>";
						echo "<td >" . $row["movie_name"]. "</td>";
						echo "<td >" . $row["description"]. "</td>";
						echo "<td >" .$row["releaseyear"]. "</td>";
						echo "<td >" .$row["director"]. "</td>";
						echo "<td >" .$row["cast"]. "</td>";
						echo "<td '>" .$row["genre"]. "</td>";
						echo "<td >" .$row["rating"]. "</td>";
						echo "<td >" .$row["comments"]. "</td>";
						echo "<td >" .$row["duration"]. "</td>";
						echo "</tr>";
					}
					echo "</table>";
				} 
				else{ 
					echo "0 results"; 
				}
				$link->close();
			}
		}

		//Check if the type of parameter is the movie's director and then find the movies with that director in the database .	
		if($searchtype=="director")
		{	
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
			</tr>
		
		<?php	
		
			$searchvalue2 = explode(" ", $_POST['searchvalue']);
			$query ="SELECT * FROM movies WHERE director like '%" . $searchvalue2[0] . "%'";
			for($i = 1; $i < count($searchvalue2); $i++) {
				if(!empty($searchvalue2[$i])) {
					$query .= " OR director like '%" . $searchvalue2[$i] . "%'";
				}
			}
			$result = $link->query($query);
			echo "<br>You have searched for searchvalues: " . $_POST['searchvalue'];
				
			if(mysqli_num_rows($result) > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<tr >";
					echo "<td >" . $row["id"] . "</td>";
					echo "<td >"	?><img src="<?php echo $row["image"];?>" height="300" width="250" />
					<?php "</td>";
					echo "<td >" . $row["movie_name"]. "</td>";
					echo "<td >" . $row["description"]. "</td>";
					echo "<td >" .$row["releaseyear"]. "</td>";
					echo "<td >" .$row["director"]. "</td>";
					echo "<td >" .$row["cast"]. "</td>";
					echo "<td '>" .$row["genre"]. "</td>";
					echo "<td >" .$row["rating"]. "</td>";
					echo "<td >" .$row["comments"]. "</td>";
					echo "<td >" .$row["duration"]. "</td>";
					echo "</tr>";
				}
				echo "</table>";
			} 
			else{ 
				echo "0 results"; 
			}
			$link->close();
			
			
		}
		
		//Check if the type of parameter is the movie's cast and then find the movies with that cast member in the database .	
		if($searchtype=="cast")
		{	
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
			</tr>
		
		<?php	
			$searchvalue2 = explode(" ", $_POST['searchvalue']);
			$query ="SELECT * FROM movies WHERE cast like '%" . $searchvalue2[0] . "%'";
		  
			for($i = 1; $i < count($searchvalue2); $i++) {
				if(!empty($searchvalue2[$i])) {
					$query .= " OR cast like '%" . $searchvalue2[$i] . "%'";
				}
			}
		 
			$result = $link->query($query);
			echo "<br>You have searched for searchvalues: " . $_POST['searchvalue'];
						 
			if(mysqli_num_rows($result) > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<tr >";
					echo "<td >" . $row["id"] . "</td>";
					echo "<td >"	?><img src="<?php echo $row["image"];?>" height="300" width="250" />
					<?php "</td>";
					echo "<td >" . $row["movie_name"]. "</td>";
					echo "<td >" . $row["description"]. "</td>";
					echo "<td >" .$row["releaseyear"]. "</td>";
					echo "<td >" .$row["director"]. "</td>";
					echo "<td >" .$row["cast"]. "</td>";
					echo "<td '>" .$row["genre"]. "</td>";
					echo "<td >" .$row["rating"]. "</td>";
					echo "<td >" .$row["comments"]. "</td>";
					echo "<td >" .$row["duration"]. "</td>";
					echo "</tr>";
				}
				echo "</table>";
			} 
			else{ 
				echo "0 results"; 
			}
			$link->close();
			
			
		}
		
	//Check if the type of parameter is the movie's genre and then find the movies with that genre in the database .	
		if($searchtype=="genre")
		{	
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
	   
			</tr>
		
		<?php	
			$searchvalue2 = explode(" ", $_POST['searchvalue']);
			$query ="SELECT * FROM movies WHERE genre like '%" . $searchvalue2[0] . "%'";
			for($i = 1; $i < count($searchvalue2); $i++) {
				if(!empty($searchvalue2[$i])) {
					$query .= " OR genre like '%" . $searchvalue2[$i] . "%'";
				}
			}
			$result = $link->query($query);
			echo "<br>You have searched for searchvalues: " . $_POST['searchvalue'];
						 
			if(mysqli_num_rows($result) > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<tr >";
					echo "<td >" . $row["id"] . "</td>";
					echo "<td >"	?><img src="<?php echo $row["image"];?>" height="300" width="250" />
					<?php "</td>";
					echo "<td >" . $row["movie_name"]. "</td>";
					echo "<td >" . $row["description"]. "</td>";
					echo "<td >" .$row["releaseyear"]. "</td>";
					echo "<td >" .$row["director"]. "</td>";
					echo "<td >" .$row["cast"]. "</td>";
					echo "<td '>" .$row["genre"]. "</td>";
					echo "<td >" .$row["rating"]. "</td>";
					echo "<td >" .$row["comments"]. "</td>";
					echo "<td >" .$row["duration"]. "</td>";
					echo "</tr>";
				}
				echo "</table>";
			} 
			else{ 
				echo "0 results"; 
			}
			$link->close();
			
			
			
		}

		//Check if the type of parameter is the movie's rating and then find the movies with a rating higher or equal to that, in the database .	
		if($searchtype=="rating")
		{	
		
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
	   
			</tr>
		
		<?php	
			 $count=0;
			$searchvalue2=doubleval($searchvalue);
			if($searchvalue2==0){
				$searchvalue2='a';
			}
			if((!is_double($searchvalue2))||($searchvalue2 >10)||($searchvalue2 <0)){
				 echo "wrong input type on field rating please go back and correct it    | ";
				 $count++;
			}
			
			if($count==0){
				$sql = "SELECT * FROM movies WHERE rating >='$searchvalue2' ";
				$result = $link->query($sql);
				
				if(mysqli_num_rows($result) > 0) {
					while($row = $result->fetch_assoc()) {
					echo "<tr >";
					echo "<td >" . $row["id"] . "</td>";
					echo "<td >"	?><img src="<?php echo $row["image"];?>" height="300" width="250" />
					<?php "</td>";
					echo "<td >" . $row["movie_name"]. "</td>";
					echo "<td >" . $row["description"]. "</td>";
					echo "<td >" .$row["releaseyear"]. "</td>";
					echo "<td >" .$row["director"]. "</td>";
					echo "<td >" .$row["cast"]. "</td>";
					echo "<td '>" .$row["genre"]. "</td>";
					echo "<td >" .$row["rating"]. "</td>";
					echo "<td >" .$row["comments"]. "</td>";
					echo "<td >" .$row["duration"]. "</td>";
				
					echo "</tr>";
					}
					echo "</table>";
				} 
				else{ 
					echo "0 results"; 
				}
				$link->close();
			}
		
		}
		
		
		
	?>

	</body>
</html>