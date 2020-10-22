<?php

	//Gets the series' id.
	if (isset($_POST['seriesid']))
	{
		$seriesid=$_POST['seriesid'];
	}	
	//Get the type of the parameter that the admin will use to update the series from the database.Example: date of release, name, id etc.
	if (isset($_POST['choice2']))
	{
		$updatetype=$_POST['choice2'];
	}	
	//Get the value that the admin will use to update the series' parameter.
	if (isset($_POST['updatevalue']))
	{
		$updatevalue=$_POST['updatevalue'];
	}
	
	
	//Create a connection with the database.
	$link = mysqli_connect(" ", " ", " ", " ");
	//Check if the connection failed. If it did, show error message.
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	
	//Check if the type of parameter is the series id then find the movie with that seriesid, in the database and change it with the id-parameter's value.
	if($updatetype=="id")
	{	
		//Update the id.
		$sql =" UPDATE series SET id='$updatevalue' WHERE id=$seriesid ";
		
		if ($link->query($sql) === TRUE) {
			echo "Record updated successfully";
			header("location: update_series.php");	
		} else {
			echo "Error updating record: " . $link->error;
		}
	    
		$link->close();
		
	}
	
	if($updatetype=="imageurl")
	{	
		
		$sql =" UPDATE series SET image='$updatevalue' WHERE id=$seriesid ";
		
		if ($link->query($sql) === TRUE) {
			echo "Record updated successfully";
			header("location: update_series.php");	
		} else {
			echo "Error updating record: " . $link->error;
		}
	    
		$link->close();
		
	}
	
	if($updatetype=="seriesname")
	{	
		
		$sql =" UPDATE series SET series_name='$updatevalue' WHERE id=$seriesid ";
		
		if ($link->query($sql) === TRUE) {
			echo "Record updated successfully";
			header("location: update_series.php");	
		} else {
			echo "Error updating record: " . $link->error;
		}
	    
		$link->close();
		
	}
	
	if($updatetype=="description")
	{	
		
		$sql =" UPDATE series SET description='$updatevalue' WHERE id=$seriesid ";
		
		if ($link->query($sql) === TRUE) {
			echo "Record updated successfully";
			header("location: update_series.php");	
		} else {
			echo "Error updating record: " . $link->error;
		}
	    
		$link->close();
		
	}
	
	if($updatetype=="releaseyear")
	{	
		
		$sql =" UPDATE series SET releaseyear='$updatevalue' WHERE id=$seriesid ";
		
		if ($link->query($sql) === TRUE) {
			echo "Record updated successfully";
			header("location: update_series.php");	
		} else {
			echo "Error updating record: " . $link->error;
		}
	    
		$link->close();
		
	}
	
	if($updatetype=="director")
	{	
		
		$sql =" UPDATE series SET director='$updatevalue' WHERE id=$seriesid ";
		
		if ($link->query($sql) === TRUE) {
			echo "Record updated successfully";
			header("location: update_series.php");	
		} else {
			echo "Error updating record: " . $link->error;
		}
	    
		$link->close();
		
	}
	
	if($updatetype=="cast")
	{	
		
		$sql =" UPDATE series SET cast='$updatevalue' WHERE id=$seriesid ";
		
		if ($link->query($sql) === TRUE) {
			echo "Record updated successfully";
			header("location: update_series.php");	
		} else {
			echo "Error updating record: " . $link->error;
		}
	    
		$link->close();
		
	}
	
	if($updatetype=="genre")
	{	
		
		$sql =" UPDATE series SET genre='$updatevalue' WHERE id=$seriesid ";
		
		if ($link->query($sql) === TRUE) {
			echo "Record updated successfully";
			header("location: update_series.php");	
		} else {
			echo "Error updating record: " . $link->error;
		}
	    
		$link->close();
		
	}
	
	if($updatetype=="rating")
	{	
		
		$sql =" UPDATE series SET rating='$updatevalue' WHERE id=$seriesid ";
		
		if ($link->query($sql) === TRUE) {
			echo "Record updated successfully";
			header("location: update_series.php");	
		} else {
			echo "Error updating record: " . $link->error;
		}
	    
		$link->close();
		
	}
	
	if($updatetype=="comments")
	{	
		
		$sql =" UPDATE series SET comments='$updatevalue' WHERE id=$seriesid ";
		
		if ($link->query($sql) === TRUE) {
			echo "Record updated successfully";
			header("location: update_series.php");	
		} else {
			echo "Error updating record: " . $link->error;
		}
	    
		$link->close();
		
	}
	
	if($updatetype=="duration")
	{	
		
		$sql =" UPDATE series SET duration='$updatevalue' WHERE id=$seriesid ";
		
		if ($link->query($sql) === TRUE) {
			echo "Record updated successfully";
			header("location: update_series.php");	
		} else {
			echo "Error updating record: " . $link->error;
		}
	    
		$link->close();
		
	}
	if($updatetype=="numberofseasons")
	{	
		
		$sql =" UPDATE series SET num_of_seasons='$updatevalue' WHERE id=$seriesid ";
		
		if ($link->query($sql) === TRUE) {
			echo "Record updated successfully";
			header("location: update_series.php");	
		} else {
			echo "Error updating record: " . $link->error;
		}
	    
		$link->close();
		
	}
	if($updatetype=="numberofepisodes")
	{	
		
		$sql =" UPDATE series SET num_of_episodes='$updatevalue' WHERE id=$seriesid ";
		
		if ($link->query($sql) === TRUE) {
			echo "Record updated successfully";
			header("location: update_series.php");	
		} else {
			echo "Error updating record: " . $link->error;
		}
	    
		$link->close();
		
	}
	
?>