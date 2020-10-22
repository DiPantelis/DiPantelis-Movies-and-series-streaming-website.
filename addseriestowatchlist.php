<?php

	//Get user's id
	if (isset($_GET['id'])) {
		$userid=$_GET['id'];
				
	}
	//Get series' id
	if (isset($_GET['msid'])) {
		$msid=$_GET['msid'];
				
	}
	//Create a connection with the database.
	$link = mysqli_connect(" ", " ", " ", " ");
   
    //Check if the connection failed. If it did, show error message.
    if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
	} 
	
	//Checks if the series exist in the watchlist of the current user. If they do, return to the all-series page.
	$query1="SELECT * FROM watchlist  WHERE userid='$userid' AND seriesid='$msid' ";  
	$result1 = mysqli_query($link, $query1);
	//Checks if there was a connection error. If there was, it shows  an error message.
	if (!$result1) {
		printf("Error: %s\n", mysqli_error($link));
		exit();
	}
	$count=mysqli_num_rows($result1);
	
	
	//If the series don't exist in the the user's watchlist(count == 0) insert the series id and the userid in the same row of the table watchlist.
	if($count==0){
		// Το Mysql_num_row μετραει τις γραμμές του πίνακα στις οποίες υπήρχε αντιστοίχηση
		
		$query2="INSERT INTO watchlist (userid ,seriesid)  VALUES ('$userid', '$msid')";
		$result2 = mysqli_query($link, $query2);
		header("location:showallseries.php?id=$userid");
		
	}
	else{
		header("location:showallseries.php?id=$userid");
	}
?>