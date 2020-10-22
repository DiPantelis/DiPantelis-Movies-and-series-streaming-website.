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
 
<html>
	<body background="eikones/cinema2.jpg">

	<?php
	
	//Get the type of the parameter that the user will choose to search series from the database.Example: date of release, name, id etc.
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
	
	//Check if the type of parameter is the series' name or part of the name and then find the series with that name, in the database.
	if($searchtype=="moviename")
	{	
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
			<th>Comments</th>
			<th>Duration</th> 
			</tr>
	
	<?php	
	
		//Check if there is the parameter's value inside of the name of any series on the series table. 
		$searchvalue2 = explode(" ", $_POST['searchvalue']);
		$query ="SELECT * FROM series WHERE series_name like '%" . $searchvalue2[0] . "%'";
      
		for($i = 1; $i < count($searchvalue2); $i++) {
			if(!empty($searchvalue2[$i])) {
				$query .= " like '%" . $searchvalue2[$i] . "%'";
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
				echo "<td >" . $row["series_name"]. "</td>";
				echo "<td>" .$row["num_of_seasons"]. "</td>";
				echo "<td>" .$row["num_of_episodes"]. "</td>";
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

	//Check if the type of parameter is the series year of release and then find the series with that year of release in the database .
	if($searchtype=="releaseyear")
	{	
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
		<th>Comments</th>
		<th>Duration</th> 
   
		</tr>
	
	<?php	
	
		$count=0;
		$searchvalue2=intval($searchvalue);
		//Checking if the user typed a character in the field year of release or a year that exceeds the limits.
		if($searchvalue2==0){
			$searchvalue2='a';
		}
		if((!is_int($searchvalue2))||($searchvalue2 >2019)||($searchvalue2 <1900)){
			 echo "wrong input type on field release_year please go back and correct it    | ";
			 $count++;
		}
		//If not , show the  list of series that match the user's searching parameter.
		if($count==0){
			$sql = "SELECT * FROM series WHERE releaseyear ='$searchvalue2' ";
			$result = $link->query($sql);
			
			if(mysqli_num_rows($result) > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<tr >";
					echo "<td >" . $row["id"] . "</td>";
					echo "<td >"	?><img src="<?php echo $row["image"];?>" height="300" width="250" />
					<?php "</td>";
					echo "<td >" . $row["series_name"]. "</td>";
					echo "<td>" .$row["num_of_seasons"]. "</td>";
					echo "<td>" .$row["num_of_episodes"]. "</td>";
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

	//Check if the type of parameter is the series' director and then find the series with that director in the database .	
	if($searchtype=="director")
	{	
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
		<th>Comments</th>
		<th>Duration</th> 
   
		</tr>
	
	<?php	
	
		$searchvalue2 = explode(" ", $_POST['searchvalue']);
		$query ="SELECT * FROM series WHERE director like '%" . $searchvalue2[0] . "%'";
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
				echo "<td >" . $row["series_name"]. "</td>";
				echo "<td>" .$row["num_of_seasons"]. "</td>";
				echo "<td>" .$row["num_of_episodes"]. "</td>";
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

	//Check if the type of parameter is the series' cast and then find the series with that cast member in the database .
	if($searchtype=="cast")
	{	
	?>	
		<body background="eikones/cinema2.jpg">
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
		<th>Comments</th>
		<th>Duration</th> 
		</tr>
	
	<?php	
	
		$searchvalue2 = explode(" ", $_POST['searchvalue']);
		$query ="SELECT * FROM series WHERE cast like '%" . $searchvalue2[0] . "%'";
  
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
				echo "<td >" . $row["series_name"]. "</td>";
				echo "<td>" .$row["num_of_seasons"]. "</td>";
				echo "<td>" .$row["num_of_episodes"]. "</td>";
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
	
	//Check if the type of parameter is the series' genre and then find the series with that genre in the database .
	if($searchtype=="genre")
	{	
	?>	
		<body background="eikones/cinema2.jpg">
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
		<th>Comments</th>
		<th>Duration</th> 
   
		</tr>
	
	<?php	
		$searchvalue2 = explode(" ", $_POST['searchvalue']);
		$query ="SELECT * FROM series WHERE genre like '%" . $searchvalue2[0] . "%'";
      
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
				echo "<td >" . $row["series_name"]. "</td>";
				echo "<td>" .$row["num_of_seasons"]. "</td>";
				echo "<td>" .$row["num_of_episodes"]. "</td>";
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
	
	//Check if the type of parameter is the series' rating and then find the series with a rating higher or equal to that, in the database .
	if($searchtype=="rating")
	{	
	
	?>	
		<body background="eikones/cinema2.jpg">
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
			$sql = "SELECT * FROM series WHERE rating >='$searchvalue2' ";
			$result = $link->query($sql);
			
			if(mysqli_num_rows($result) > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<tr >";
					echo "<td >" . $row["id"] . "</td>";
					echo "<td >"	?><img src="<?php echo $row["image"];?>" height="300" width="250" />
					<?php "</td>";
					echo "<td >" . $row["series_name"]. "</td>";
					echo "<td>" .$row["num_of_seasons"]. "</td>";
					echo "<td>" .$row["num_of_episodes"]. "</td>";
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