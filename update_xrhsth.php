<?php

	//Gets the user's id.
	if (isset($_POST['userid']))
	{
		$userid=$_POST['userid'];
	}	
	//Get the type of the parameter that the admin will use to update the user's data from the database.
	if (isset($_POST['choice2']))
	{
		$updatetype=$_POST['choice2'];
	}	
	//Get the value that the admin will use as a parameter to update the users's data.
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
	
	//Check if the type of parameter is the users's id then find the user with that userid, in the database and change it with the id-parameter's value.
	if($updatetype=="id")
	{	
		//Update the id.
		$sql =" UPDATE users SET id='$updatevalue' WHERE id=$userid ";
		
		if ($link->query($sql) === TRUE) {
			echo "Record updated successfully";
			header("location: update_user.php");	
		} else {
			echo "Error updating record: " . $link->error;
		}
	    
		$link->close();
		
	}
	if($updatetype=="username")
	{	
		
		$sql =" UPDATE users SET username='$updatevalue' WHERE id=$userid ";
		
		if ($link->query($sql) === TRUE) {
			echo "Record updated successfully";
			header("location: update_user.php");	
		} else {
			echo "Error updating record: " . $link->error;
		}
	    
		$link->close();
		
	}
	if($updatetype=="name")
	{	
		
		$sql =" UPDATE users SET first_name='$updatevalue' WHERE id=$userid ";
		
		if ($link->query($sql) === TRUE) {
			echo "Record updated successfully";
			header("location: update_user.php");	
		} else {
			echo "Error updating record: " . $link->error;
		}
	    
		$link->close();
		
	}
	if($updatetype=="surname")
	{	
		
		$sql =" UPDATE users SET last_name='$updatevalue' WHERE id=$userid ";
		
		if ($link->query($sql) === TRUE) {
			echo "Record updated successfully";
			header("location: update_user.php");	
		} else {
			echo "Error updating record: " . $link->error;
		}
	    
		$link->close();
		
	}
	if($updatetype=="email")
	{	
		
		$sql =" UPDATE users SET email='$updatevalue' WHERE id=$userid ";
		
		if ($link->query($sql) === TRUE) {
			echo "Record updated successfully";
			header("location: update_user.php");	
		} else {
			echo "Error updating record: " . $link->error;
		}
	    
		$link->close();
		
	}
	if($updatetype=="city")
	{	
		
		$sql =" UPDATE users SET city='$updatevalue' WHERE id=$userid ";
		
		if ($link->query($sql) === TRUE) {
			echo "Record updated successfully";
			header("location: update_user.php");	
		} else {
			echo "Error updating record: " . $link->error;
		}
	    
		$link->close();
		
	}
	if($updatetype=="phone")
	{	
		
		$sql =" UPDATE users SET phone='$updatevalue' WHERE id=$userid ";
		
		if ($link->query($sql) === TRUE) {
			echo "Record updated successfully";
			header("location: update_user.php");	
		} else {
			echo "Error updating record: " . $link->error;
		}
	    
		$link->close();
		
	}
	if($updatetype=="password")
	{	
		
		$sql =" UPDATE users SET password='$updatevalue' WHERE id=$userid ";
		
		if ($link->query($sql) === TRUE) {
			echo "Record updated successfully";
			header("location: update_user.php");	
		} else {
			echo "Error updating record: " . $link->error;
		}
	    
		$link->close();
		
	}
?>
