<?php

	//Gets the user's id.
	if (isset($_GET['id'])) {
		$value4=$_GET['id'];
	}	
	
	//Creates a connection with the database.
	$link = mysqli_connect(" ", " ", " ", " ");
 	//Checks if the connection failed. If it did, show error message.
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	
	//Delete from the activeusers table the record with the user's id .
	$query3="DELETE FROM activeusers  WHERE userid='$value4'";
	$result3 = mysqli_query($link, $query3);
	mysqli_close($link);
	//Go to the index page. 
	header("location: Main.php?id=$value2");
	
?>