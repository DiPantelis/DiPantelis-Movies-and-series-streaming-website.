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
	
	//Get the movies' comments the user typed.
	$comments=mysqli_real_escape_string($link, $_REQUEST['comments']);
	
	//Find the username of the user's id from the database.
	$query=" SELECT username FROM users WHERE id='$userid' ";
	$result = mysqli_query($link,$query);
	$value = mysqli_fetch_object($result);		//returns the selected row as an object.
	$value2= $value->username;					
	
	//Find the previous comments that are stored in the database for the particular movie.
	$query=" SELECT comments FROM movies WHERE id='$msid' ";
	$result = mysqli_query($link,$query);
	$value3 = mysqli_fetch_object($result);
	$commentsold= $value3->comments;
	
	//Store the new user's comment along with the old comments in the database.
	$text="Ο χρήστης " . $value2 . "\n" . " σχολίασε: " . " [ " . $comments . " ] " . "\n" . $commentsold;
	$sql="UPDATE movies SET comments='$text'  WHERE id='$msid'";
	
	//If the connection and data transfer was succesfull, return to the adminpage.Otherwise show error message on screen.
	if(mysqli_query($link, $sql)){
			header("location:showallmovies.php?id=$userid");
	}  
	else{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
		
	// Close connection
	mysqli_close($link);	
?>