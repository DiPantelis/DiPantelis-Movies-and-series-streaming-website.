<?php

	//Gets the username,password and type of user()user admin) who is attempting to connect on the website.
	$username=$_POST['username'];
	$password=$_POST['password'];
	$usertype=$_POST['epilogi'];

	//Creates a connection with the database.
	$link = mysqli_connect(" ", " ", " ", " "); 
	//Checks if the connection failed. If it did, show error message.
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}

	//Check if it's a user who is trying to login.
	if($usertype=="User")
	{
		//Checks if there is a user with this usename and password the database.
		$query="SELECT * FROM users WHERE username='$username' AND password='$password'";  
		$result = mysqli_query($link, $query);
		if (!$result) {
			printf("Error: %s\n", mysqli_error($link));
			exit();
		}
		$count=mysqli_num_rows($result);
		
		//If there is a match($count==1), it fetches the user's id an puts it in the activeusers' table inside the database.Show the user, the user's main screen.
		if($count==1){
			$query2="INSERT INTO activeusers (userid) SELECT id FROM users WHERE username='$username' AND password='$password'";
			$result2 = mysqli_query($link, $query2);
			header("location: userpage.php?us=$username&pw=$password");	
			return true;
		}
		//Otherwise show error message.
		else{
		
			echo "Wrong Username or Password";
			return false;
		}	
		mysqli_close($link);	 
	}
	
	//Check if it's the admin who is trying to login.
	elseif($usertype=="Administrator")
	{
		//Checks if there is an admin with this usename and password the database.
		$query="SELECT * FROM admin WHERE admin_name='$username' AND admin_password='$password'"; 
		$result = mysqli_query($link, $query);
		if (!$result) {
			printf("Error: %s\n", mysqli_error($link));
			exit();
		}
		$count=mysqli_num_rows($result);
		
		//If there is a match($count==1), show the admin, the admin's main screen.
		if($count==1){
			
			header("location: adminpage.php");		
			return true;
		}	
		//Otherwise show error message.
		else {
			echo "Wrong Username or Password";
			return false;
		}
		mysqli_close($link);
	}

?>
