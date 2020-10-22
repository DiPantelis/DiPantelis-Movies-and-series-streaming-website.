<?php

		$count=0;
		//Get admin's value for the movie's duration,
		//If $duration gets a character as input, doubleval returns 0 as an output.
		//Then the value=0 is  given as value for the $duration2 variable.
		$duration=$_POST['duration'];
		$duration2=doubleval($duration);
		
		//Then  $duration2's value is turned into the 'a' character so the function is_double rejects it as a double.
		if($duration2==0){
			$duration2='a';
		}
		
		//If the input is a character or a number bigger than 9.99, show error message
		if((!is_double($duration2))||($duration2 >9.99)){
			 echo "wrong input type on field duration please go back and correct it    | ";
			 $count++;
		}
	
		//Get admin's value for the movie's year of release.
		//If $releaseyear gets a character as input, intval returns 0 as an output.
		//Then the value=0 is  given as value for the $releaseyear2 variable.
		$releaseyear=$_POST['releaseyear'];
		$releaseyear2=intval($releaseyear);
		
		//Then  $releaseyear2's value is turned into the 'a' character so the function is_int rejects it as an int.
		if($releaseyear2==0){
			$releaseyear2='a';
		}
		//If the input is a character or a number bigger than 2019 or smaller than 1888, show error message
		if((!is_int($releaseyear2))||($releaseyear2 <1888)||($releaseyear2 >2019)){
			 echo "wrong input type on field year please go back and correct it     |";
			$count++;
		}
		
		//Get admin's value for the movie's rating,
		//If $rating gets a character as input, doubleval returns 0 as an output.
		//Then the value=0 is  given as value for the $rating2 variable.
		$rating=$_POST['rating'];
		$rating2=doubleval($rating);
		
		//Then  $rating2's value is turned into the 'a' character so the function is_double rejects it as a double.
		if($rating2==0){
			$rating2='a';
		}
		//If the input is a character or a number bigger than 10 or smaller than 0, show error message
		if((!is_double($rating2))||($rating2 <0)||($rating2 >10)){
			 echo "wrong input type on field rating please go back and correct it     |";
			$count++;
		}
	    //Check if there was an error in the inputs.If not create a connection with the database.
		if($count==0){
			echo"success";
			$link = mysqli_connect(" ", " ", " ", " ");
 
			// Check connection
			if($link === false){
				die("ERROR: Could not connect. " . mysqli_connect_error());
			}
			
			// Escape user inputs for security
			$moviename= mysqli_real_escape_string($link, $_REQUEST['moviename']);
			$description = mysqli_real_escape_string($link, $_REQUEST['description']);
			$releaseyear = mysqli_real_escape_string($link, $_REQUEST['releaseyear']);
			$director = mysqli_real_escape_string($link, $_REQUEST['director']);
			$cast=mysqli_real_escape_string($link, $_REQUEST['cast']);
			$genre=mysqli_real_escape_string($link, $_REQUEST['genre']);
			$rating=mysqli_real_escape_string($link, $_REQUEST['rating']);
			$comments=mysqli_real_escape_string($link, $_REQUEST['comments']);
			$duration=mysqli_real_escape_string($link, $_REQUEST['duration']);
			$imagelink=mysqli_real_escape_string($link, $_REQUEST['imagelink']);
			$videolink=mysqli_real_escape_string($link, $_REQUEST['videolink']);
			
			// Attempt to insert query execution
			$sql = "INSERT INTO movies( movie_name, description, releaseyear, director, cast, genre, rating, comments, duration, image,video )
			VALUES ( '$moviename', '$description', '$releaseyear', '$director', '$cast','$genre','$rating','$comments','$duration','$imagelink','$videolink')";

			//If the connection and data transfer was succesfull, return to the adminpage.Otherwise show error message on screen.
			if(mysqli_query($link, $sql)){
				header("location: adminpage.php");
			} else{
				echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
 
			// Close connection
			mysqli_close($link);
			
		}
	
?>

