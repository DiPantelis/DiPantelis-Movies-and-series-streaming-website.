<?php

    //Gets the user's id.
	if (isset($_GET['id'])) {
		$userid=$_GET['id'];
	}
	//Gets the series' id.
	if (isset($_GET['msid'])) {
		$msid=$_GET['msid'];
	}	
	//Gets the user's rating.
	$va8mos=$_POST['va8mos'];
	
	//Creates a connection with the database.
	$link = mysqli_connect(" ", " ", " ", " ");
	//Checks if the connection failed. If it did, show error message.
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	
	//Checks if there is a user's record for this series' id in the ratings table of the database.
	$query1="SELECT * FROM ratings  WHERE userid='$userid' AND seriesid='$msid' AND  movieid=0 ";  
	$result1 = mysqli_query($link, $query1);
	if (!$result1) {
		printf("Error: %s\n", mysqli_error($link));
		exit();
	}
	$count=mysqli_num_rows($result1);
	
	//If there wasn't such a record is the ratings table.
	if($count==0){
		
		//Insert a record with the user's rating for this series in the ratings table.
		$query2="INSERT INTO ratings (userid ,seriesid)  VALUES ('$userid', '$msid')";
		$result2 = mysqli_query($link, $query2);
		$query=" SELECT rating FROM series WHERE id='$msid' ";
		$result = mysqli_query($link,$query);
		$value3 = mysqli_fetch_object($result);
		$ratingold= $value3->rating;
	
		//Update the series' rating on the series table of the database.
		$rating=(($ratingold+$va8mos)/2);
		$sql="UPDATE series SET rating='$rating'  WHERE id='$msid'";
		if(mysqli_query($link, $sql)){
			header("location:showallseries.php?id=$userid");
		}  
		//If it failed to update it, show error message.
		else{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}	
	}
	//Otherwise show error message.
	else{
		echo "Oops...You have already voted for this series!!";
	}
	// Close connection
	mysqli_close($link);	
?>