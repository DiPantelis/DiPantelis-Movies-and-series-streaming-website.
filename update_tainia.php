<?php

	//Gets the movie's id.
	if (isset($_POST['movieid']))
	{
		$movieid=$_POST['movieid'];
	}	
	//Get the type of the parameter that the admin will use to update the movie from the database.Example: date of release, name, id etc.
	if (isset($_POST['choice2']))
	{
		$updatetype=$_POST['choice2'];
	}	
	//Get the value that the admin will use to update the movie's parameter.
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
	
	//Check if the type of parameter is the movie's id then find the movie with that moviesid, in the database and change it with the id-parameter's value.
	if($updatetype=="id")
	{	
		//Update the id.
		$sql =" UPDATE movies SET id='$updatevalue' WHERE id=$movieid ";
		
		if ($link->query($sql) === TRUE) {
			echo "Record updated successfully";
			header("location: update_movies.php");	
		} else {
			echo "Error updating record: " . $link->error;
		}
	    
		$link->close();
		
	}
	if($updatetype=="imageurl")
	{	
		
		$sql =" UPDATE movies SET image='$updatevalue' WHERE id=$movieid ";
		
		if ($link->query($sql) === TRUE) {
			echo "Record updated successfully";
			header("location: update_movies.php");	
		} else {
			echo "Error updating record: " . $link->error;
		}
	    
		$link->close();
		
	}
	if($updatetype=="moviename")
	{	
		
		$sql =" UPDATE movies SET movie_name='$updatevalue' WHERE id=$movieid ";
		
		if ($link->query($sql) === TRUE) {
			echo "Record updated successfully";
			header("location: update_movies.php");	
		} else {
			echo "Error updating record: " . $link->error;
		}
	    
		$link->close();
		
	}
	if($updatetype=="description")
	{	
		
		$sql =" UPDATE movies SET description='$updatevalue' WHERE id=$movieid ";
		
		if ($link->query($sql) === TRUE) {
			echo "Record updated successfully";
			header("location: update_movies.php");	
		} else {
			echo "Error updating record: " . $link->error;
		}
	    
		$link->close();
		
	}
	if($updatetype=="releaseyear")
	{	
		
		$sql =" UPDATE movies SET releaseyear='$updatevalue' WHERE id=$movieid ";
		
		if ($link->query($sql) === TRUE) {
			echo "Record updated successfully";
			header("location: update_movies.php");	
		} else {
			echo "Error updating record: " . $link->error;
		}
	    
		$link->close();
		
	}
	if($updatetype=="director")
	{	
		
		$sql =" UPDATE movies SET director='$updatevalue' WHERE id=$movieid ";
		
		if ($link->query($sql) === TRUE) {
			echo "Record updated successfully";
			header("location: update_movies.php");	
		} else {
			echo "Error updating record: " . $link->error;
		}
	    
		$link->close();
		
	}
	if($updatetype=="cast")
	{	
		
		$sql =" UPDATE movies SET cast='$updatevalue' WHERE id=$movieid ";
		
		if ($link->query($sql) === TRUE) {
			echo "Record updated successfully";
			header("location: update_movies.php");	
		} else {
			echo "Error updating record: " . $link->error;
		}
	    
		$link->close();
		
	}
	if($updatetype=="genre")
	{	
		
		$sql =" UPDATE movies SET genre='$updatevalue' WHERE id=$movieid ";
		
		if ($link->query($sql) === TRUE) {
			echo "Record updated successfully";
			header("location: update_movies.php");	
		} else {
			echo "Error updating record: " . $link->error;
		}
	    
		$link->close();
		
	}
	
	if($updatetype=="rating")
	{	
		
		$sql =" UPDATE movies SET rating='$updatevalue' WHERE id=$movieid ";
		
		if ($link->query($sql) === TRUE) {
			echo "Record updated successfully";
			header("location: update_movies.php");	
		} else {
			echo "Error updating record: " . $link->error;
		}
	    
		$link->close();
		
	}
	
	if($updatetype=="comments")
	{	
		
		$sql =" UPDATE movies SET comments='$updatevalue' WHERE id=$movieid ";
		
		if ($link->query($sql) === TRUE) {
			echo "Record updated successfully";
			header("location: update_movies.php");	
		} else {
			echo "Error updating record: " . $link->error;
		}
	    
		$link->close();
		
	}
	
	if($updatetype=="duration")
	{	
		
		$sql =" UPDATE movies SET duration='$updatevalue' WHERE id=$movieid ";
		
		if ($link->query($sql) === TRUE) {
			echo "Record updated successfully";
			header("location: update_movies.php");	
		} else {
			echo "Error updating record: " . $link->error;
		}
	    
		$link->close();
		
	}
	
?>