<?php

	
	//Get user's id
	if (isset($_GET['id'])) {
		$userid=$_GET['id'];
				
	}
	//Get movie's id
	if (isset($_GET['msid'])) {
		$msid=$_GET['msid'];
				
	}
	//Create a connection with the database.
	$link = mysqli_connect(" ", " ", " ", " ");
	
	//Check if the connection failed. If it did, show error message.
    if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	} 
	
	//Checks if the movie exists in the watchlist of the current user. If it does, return to the all-movies page.
	$query1="SELECT * FROM watchlist  WHERE userid='$userid' AND movieid='$msid' ";  
	$result1 = mysqli_query($link, $query1);
	//Checks if there was a connection error. If there was, it shows  an error message.
	if (!$result1) {
		printf("Error: %s\n", mysqli_error($link));
		exit();
	}
	$count=mysqli_num_rows($result1);
	
	//If the movie doesn't exist in the the user's watchlist(count == 0) insert the movies id and the userid in the same row of the table watchlist.
	if($count==0){
				
		$query2="INSERT INTO watchlist (userid ,movieid)  VALUES ('$userid', '$msid')";
		$result2 = mysqli_query($link, $query2);
		header("location:showallmovies.php?id=$userid");
		
	}
	else{
		header("location:showallmovies.php?id=$userid");
	}
?>