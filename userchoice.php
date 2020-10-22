<?php
	
	//Get the user's id.
	if (isset($_GET['id'])) {
		$userid=$_GET['id'];
		echo $userid;
		
	}
	//Then according to the link the user presses, lead him to the appropriate webpage.
	if (isset($_POST['allmovies']))
	{
		header("location:showallmovies.php?id=$userid");
	}

	else if (isset($_POST['allseries']))
	{
		header("location:showallseries.php?id=$userid");
	}

	else if (isset($_POST['searchmovies']))
	{	
		header("location: search_movies.php");
			
	}
	
	else if (isset($_POST['searchseries']))
	{
		header("location: search_series.php");
	}

	else if (isset($_POST['favoritemovies']))
	{	
		header("location:showfavoritelist.php?id=$userid");
			
	}
	
	else if (isset($_POST['favoriteseries']))
	{	
		header("location:showfavoritelistseries.php?id=$userid");
			
	}
	
	else if (isset($_POST['watchlistmovies']))
	{	
		header("location:showwatchlist.php?id=$userid");
			
	}
	
	else if (isset($_POST['watchlistseries']))
	{	
		header("location:showwatchlistseries.php?id=$userid");
			
	}
	
	else{
			echo"failure";
		}	
?>
