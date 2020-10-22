
<?php
	
	//Create a connection with the database.
	$link = mysqli_connect(" ", " ", " ", " ");
	//Check if the connection failed. If it did, show error message.
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	
	$counter=0;
	// Escape user inputs for security
	$username= mysqli_real_escape_string($link, $_REQUEST['username']);
	//Check if there are any users in the users table the requested username.
	$query="SELECT * FROM users WHERE username='$username' "; 
		$result = mysqli_query($link, $query);
		if (!$result) {
			echo "Error in databse link";
			exit();
		}
		
		$count=mysqli_num_rows($result);
		//If there was a match, show error message.
		if($count>0){
			echo "The username you used already exists in our database";
			$counter++;
		}

	$first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);
	$last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);
	$email = mysqli_real_escape_string($link, $_REQUEST['email']);

	//Check if e-mail address is well-formed
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo "Invalid email format";
		$counter++;
	}

	//Check if the email already exists in the database.
	$query2="SELECT * FROM users WHERE email='$email' "; 
		$result2 = mysqli_query($link, $query2);
		
		if (!$result2) {
		printf("Error: %s\n", mysqli_error($link));
		exit();
		}
		
	//If there was a match, show error message.
	$count2=mysqli_num_rows($result2);
	if($count2>0){
		echo "The email you used already exists in our database";
		$counter++;
	}

	//Get phone and address of the user.	
	$city=mysqli_real_escape_string($link, $_REQUEST['city']);
	$phone=mysqli_real_escape_string($link, $_REQUEST['phone']);
	$phone=intval($phone);

	//Check if there is a character into phone varable's value. If there is, show error message.  
	if($phone==0){
		$phone='a';
	}
	if(!is_int($phone)){
		 echo "wrong input type on field phone please go back and correct it    | ";
		 $counter++;
	}
	
	//Get the user's password.		
	$userpass=mysqli_real_escape_string($link, $_REQUEST['userpass']);

	// Attempt insert query execution
	if($counter==0){
		$sql = "INSERT INTO users( username, first_name, last_name, email, city, phone, password)
		VALUES ( '$username', '$first_name', '$last_name', '$email', '$city','$phone','$userpass')";
		
		//If it fails, show error message.
		if(mysqli_query($link, $sql)){
			echo "Your account has been created successfully.Please login by returning to the Login Page.";
		} else{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	} 
	// Close connection
	mysqli_close($link);
?>



