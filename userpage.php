<html>
	<style>
	#koumpi
	{
		background-color: #541043;
		color: white ;
		width: 420px;
		height: 50px;
	}
	
	#eksodos
	{
		width: 40px;
		height: 40px;

	}
	
	table
	{
		border-collapse: seperate;
		border: 1px solid black;
		width: 100%;
		height: 92%;
	}

	img
	{
		width: 420px;
		height: 160px;
	}
	
	#board{
		position: absolute;
		right: 20px;
		width: 100px;
		height: 100px;
		padding: 10px;
	}
	
	#board2{
		position: absolute;
		right: 20px;
		top:120px;
		width: 100px;
		height: 100px;
		padding: 10px;
	}
	
	h1
	{	
		text-align: center;
	}

	#dimiourgia 
	{
		border-collapse: seperate;
		width:860px;
		height:1000px;
		margin: auto;
	}

	h1  {
	  background-color:    #541043   ;
	  color: white;
	}
	.background {
		background:url('eikones/cinema5.jpg');
		position: relative;
		
	}
	body {
	  background-image: url('eikones/userpage.jpg');
	  background-repeat: no-repeat;
	  background-attachment: fixed;
	  background-position:center top;
	}
	
	</style>

	<?php
	
		//Gets the user's username and password.
		if ((isset($_GET['pw']))&& (isset($_GET['us']))) {
			$userus=$_GET['us'];
			$userpw=$_GET['pw'];
		}
			
		//Create a connection with the database.
		$link = mysqli_connect(" ", " ", " ", " ");
		//Check if the connection failed. If it did, show error message.
		if($link === false){
			die("ERROR: Could not connect. " . mysqli_connect_error());
		}
			
		//Fetch the user's id from the users table.
		$query7="SELECT id FROM users WHERE username='$userus' AND password='$userpw'";
		$result7 = mysqli_query($link,$query7);
		$value = mysqli_fetch_object($result7);
		$value2= $value->id;
			
		//Find the records in the activeusers table where the userid = with the id that was fetched right before and stored in $value2.
		$query8="SELECT userid FROM activeusers WHERE userid='$value2'";
		$result8 = mysqli_query($link,$query8);
		$count=mysqli_num_rows($result8);
		
		//If there were any records by that user id in the activeusers table and the logout button is pressed, remove that userid from the active users table.		
		if($count>0){
			$userid=$value2;
		}
			
		function removeUser($userid) {
			header("location: removeuser.php?id=$userid");
		}
		
		if(array_key_exists('logoutb',$_POST)){
			removeUser($userid);
		}
		
		
		if($count>0){
			//If there were any records by that user id in the activeusers table and there are movies in his watch list, show a watchlist reminder on his user page.
			$query2="SELECT * FROM watchlist WHERE movieid>0 AND userid='$userid' ";  
			$result2 = mysqli_query($link, $query2);
			$count2=mysqli_num_rows($result2);
			 if($count2>0){
				 ?><div>
						 <a href="showwatchlist.php?id=<?php echo $userid ?>"><img border="0"  src="eikones/Notificationsmovies.png" id="board"></a>
					
					</div>
				 <?php
			 }
			 //If there were any records by that user id in the activeusers table and there are series in his watch list, show a watchlist reminder on his user page.
			$query3="SELECT * FROM watchlist WHERE seriesid>0 AND userid='$userid'";  
			$result3 = mysqli_query($link, $query3);
			$count3=mysqli_num_rows($result3);
			if($count3>0){
				?><div>
						
						<a href="showwatchlistseries.php?id=<?php echo $userid ?>"><img border="0"  src="eikones/Notificationsseries.png" id="board2"></a>
					</div>
				 <?php
			}
		}
		mysqli_close($link);
	?>


	<body>
			<br><br><br><br><br><br><br><br><br><br><br><br>
			<h1>  Καλώς ορίσατε στo M&S </h1>
			<form  method="post">
			<input width="80" height="80" type="submit" src="eikones/logout.png" name="logoutb" id="button" value="Logout">
			</form>
			<!--gia na perasei to userid se olo to userchoice xrhsimopoihsa to id get ktl sto action-->
			<form action="userchoice.php?id=<?php echo $userid ?>" method="POST">
				<div id="dimiourgia" class="background">
					<h1>Επιλογές χρήστη </h1>
					<table border="1" >
					
						<tr>
							<td><img src="eikones/cinema2.jpg"  > </a></td>
							<td><img src="eikones/cinema6.jpg"  > </a></td>
						</tr>
						<tr>
							<td align="center"><input id="koumpi" name="allmovies" type="submit" value="Όλες οι ταινίες" length="5"/></td>
							<td align="center"><input id="koumpi" name="allseries" type="submit" value="Όλες οι σειρές" length="5"/></td>

							
						</tr>
						<tr>	
							<td><img src="eikones/moviessearch.jpg"  > </a></td>
							<td><img src="eikones/searchingseries.jpg"  > </a></td>
							
						</tr>

						<tr>
							<td align="center"><input id="koumpi" name="searchmovies" type="submit" value="Αναζήτηση ταινιών" length="5"/></td>
							<td align="center"><input id="koumpi" name="searchseries" type="submit" value="Αναζήτηση σειρών" length="5"/></td>
						</tr>
						<tr>
							<td><img src="eikones/favorites2.png"  > </a></td>
							<td><img src="eikones/favorites.png"  > </a></td>
						</tr>
						<tr>
							<td align="center"><input id="koumpi" name="favoritemovies" type="submit" value="Αγαπημένες ταινίες" length="5"/></td>
							<td align="center"><input id="koumpi" name="favoriteseries" type="submit" value="Αγαπημένες σειρές" length="5"/></td>
						</tr>
						<tr>
							<td><img src="eikones/watchlist3.jpeg"  > </a></td>
							<td><img src="eikones/watchlist2.png"  > </a></td>
						</tr>
						<tr>
							<td align="center"><input id="koumpi" name="watchlistmovies" type="submit" value="Ταινίες στη λίστα για αργότερα" length="5"/></td>
							<td align="center"><input id="koumpi" name="watchlistseries" type="submit" value="Σειρές στη λίστα για αργότερα" length="5"/></td>
						</tr>
					</table>
				</div>
			</form>

	</body>
</html>

