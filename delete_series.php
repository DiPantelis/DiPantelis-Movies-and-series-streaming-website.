<?php

	//Get the type of the parameter that admin will choose to delete series from the database. Example: date of release, name, id etc.
	if (isset($_POST['choice']))
	{
		$deletetype=$_POST['choice'];
	}	
	//Get the value  of the parameter that admin will choose to delete series according to it.
	if (isset($_POST['deletevalue']))
	{
		$deletevalue=trim($_POST['deletevalue']);
		echo "$deletevalue";
	}
	
	//Create a connection with the database.
	$link = mysqli_connect(" ", " ", " ", " ");
 
	//Check if the connection failed. If it did, show error message.
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	
	//Check if the type of parameter is the series' id and then find the series with that id in the database and delete them.
	if($deletetype=="id")
	{	
		$sql = "DELETE FROM series WHERE id=$deletevalue";
		if ($link->query($sql) === TRUE) {
			echo "Record deleted successfully";
			header("location: dseries.php");	
		} else {
			echo "Error deleting record: " . $link->error;
		}
		$link->close();
	}
	
	//Check if the type of parameter is the series' name and then find the movie with that name in the database and delete them.
	if($deletetype=="seriesname")
	{	
		$sql = "DELETE FROM series WHERE series_name='$deletevalue' LIMIT 1";
		if ($link->query($sql) === TRUE) {
			echo "Record deleted successfully";
			header("location: dseries.php");	
		} else {
			echo "Error deleting record: " . $link->error;
		}
		$link->close();	
	}
	
	//Check if the type of parameter is the series' rating and then find the ones that have a rating equal or less than the parameter's value in the database and delete them.
	if($deletetype=="rating")
	{	
		$sql = "DELETE FROM series WHERE rating <='$deletevalue' ";
		if ($link->query($sql) === TRUE) {
			echo "Record deleted successfully";
			header("location: dseries.php");	
		} else {
			echo "Error deleting record: " . $link->error;
		}
		$link->close();
	}
	
	//Check if the type of parameter is the series' year of release and then find the ones that had been released sooner or at the year that the parameter's value indicates, in the database and delete them.	
	if($deletetype=="releaseyear")
	{	
		$sql = "DELETE FROM series WHERE releaseyear <='$deletevalue' ";
		if ($link->query($sql) === TRUE) {
			echo "Record deleted successfully";
			header("location: dseries.php");	
		} else {
			echo "Error deleting record: " . $link->error;
		}
		$link->close();
		
	}
?>
			 
			 
			 