<?php

	//Gets the movie's id.
	if (isset($_GET['msid'])) {
		$msid=$_GET['msid'];
	}
	
	//Creates a connection with the database.
	$link = mysqli_connect(" ", " ", " ", " ");
    //Checks if the connection failed. If it did, show error message.
    if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	} 
	
	//Fetch the movie's, with that id, video url .
	$query="SELECT * FROM movies WHERE id='$msid'";
	$result = mysqli_query($link,$query);
	$value = mysqli_fetch_object($result);
	$value2= $value->video;
	
?>


<html>

<style>

	body {
		background-image: url('eikones/cinema7.jpg');
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-position:center;
	}
	
	.center {
		display: block;
		position: absolute;
		margin: auto;
		top: 50;
		left: 0;
		right: 0;
		bottom: 0;
	  
	}

</style>

<body>
	<div >
		<iframe width="720" height="480" src="<?php echo $value2; ?>" class="center" ></iframe> 
	</div>
</body>

</html>