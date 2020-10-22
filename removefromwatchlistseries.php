<?php

	//Gets the user's id.
	if (isset($_GET['id'])) {
		$userid=$_GET['id'];
	}	
	//Gets the series' id.
	if (isset($_GET['msid'])) {
		$msid=$_GET['msid'];
	}	
	
	//Creates a connection with the database.
	$link = mysqli_connect(" ", " ", " ", " ");
	//Checks if the connection failed. If it did, show error message.
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	
	//Delete from the watchlist table the record with the user's id and the series' id.
	$query3="DELETE FROM watchlist  WHERE userid='$userid' AND seriesid='$msid' ";
	$result3 = mysqli_query($link, $query3);
	mysqli_close($link);
	//Reload the user's series watch-list page. 
	header("location: showwatchlistseries.php?id=$userid");
	
?>