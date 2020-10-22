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
	img	{
		width: 280px;
		height: 380px;
	}
	
 </style>
 
<html>

<body background="eikones/series.jpg">
	<div align="Center" >
		<form action="delete_series.php" method="POST">		
  			 
				<font color="white"> <h1>  Διαγραφή σειράς  βάσει: </h1> </font>
				<select name="choice">
							<option value="id">id</option>
							<option value="seriesname">ονόματος</option>   				  	
							<option value="rating">βαθμολογίας</option> 
							<option value="releaseyear">έτους κυκλοφορίας</option> 	
				</select>
				<input type="text" name="deletevalue" required="required" ><p>
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
	
	//Checks if there are series in the database.
	$sql = "SELECT * FROM series";
	$result = $link->query($sql);
	//If there are, it fetches the series' data and shows them on screen.
	if ($result->num_rows > 0) {
		
	// output data of each row.
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
	//Otherwise show error message.
	else{ 
		echo "0 results"; 
	}
	$link->close();

?>
</table>
</body>
</html>