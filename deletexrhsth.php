<?php

	//Get the type of the parameter that admin will choose to delete a user from the database.
	if (isset($_POST['choice']))
	{
		$deletetype=$_POST['choice'];
	}	
	//Get the value  of the parameter that admin will choose to delete users, according to it.
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
	
	//Check if the type of parameter is the user's id and then find the user with that id in the database and delete him.
	if($deletetype=="id")
	{	
		$sql = "DELETE FROM users WHERE id=$deletevalue";
		if ($link->query($sql) === TRUE) {
			echo "Record deleted successfully";
			header("location: adminpage.php");	
		} else {
			echo "Error deleting record: " . $link->error;
		}
		$link->close();
	}
	
	//Check if the type of parameter is the user's username and then find the user with that username in the database and delete him.
	if($deletetype=="Username")
	{	
		$sql = "DELETE FROM users WHERE username='$deletevalue' LIMIT 1";
		if ($link->query($sql) === TRUE) {
			echo "Record deleted successfully";
			header("location: adminpage.php");	
		} else {
			echo "Error deleting record: " . $link->error;
		}
		$link->close();
	}
	
	//Check if the type of parameter is the user's email and then find the user with that email in the database and delete him.
	if($deletetype=="email")
	{	
		$sql = "DELETE FROM users WHERE email='$deletevalue' LIMIT 1";
		if ($link->query($sql) === TRUE) {
			echo "Record deleted successfully";
			header("location: adminpage.php");	
		} else {
			echo "Error deleting record: " . $link->error;
		}
		$link->close();
	}
?>
