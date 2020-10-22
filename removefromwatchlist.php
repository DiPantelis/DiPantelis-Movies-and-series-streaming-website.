<?php

	//Gets the user's id.
	if (isset($_GET['id'])) {
		$userid=$_GET['id'];
	}	
	//Gets the movie's id.
	if (isset($_GET['msid'])) {
		$msid=$_GET['msid'];
	}	
	
	//Creates a connection with the database.
	$link = mysqli_connect(" ", " ", " ", " ");
	//Checks if the connection failed. If it did, show error message.
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	
	//Delete from the watchlist table the record with the user's id and the movie's id.
	$query3="DELETE FROM watchlist  WHERE userid='$userid' AND movieid='$msid' ";
	$result3 = mysqli_query($link, $query3);
	mysqli_close($link);
	//Reload the user's movies watch-list page. 
	header("location: showwatchlist.php?id=$userid");
	
?>