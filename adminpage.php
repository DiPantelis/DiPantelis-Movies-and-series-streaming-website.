<style>

	#koumpi
	{
		border-collapse: collapse;
		background-color: #541043;
		color: white ;
		width: 160px;
	}
	#eksodos
	{
		width: 40px;
		height: 40px;

	}
	table
	{
		margin-left: 70px;
	}
	img
	{
		width: 160px;
		height: 90px;
	}
	h1
	{	
		text-align: center;
	}

	#dimiourgia 
	{
		border-bottom-style: dotted;
		width:760px;
		height:250px;
		margin: auto;
	}
	#dimiourgia2
	{	
		width:760px;
		height:250px;
		margin: auto;
	}

	h1  {
	  background-color:    #541043   ;
	  color: white;
	}

</style>

<html>

<body background="eikones/adminpage.jpg">

	<h1>  Καλώς ορίσατε στη σελίδα διαχειριστή</h1>
	
	<a href="Main.php"/><img  id="eksodos" src="eikones/back.png"></a>
	<h4><strong><font size="3" color="white">To Login Page</font></strong></h4>
	
	<form action="adminsetusers.php" method="POST">
		<div id="dimiourgia" class="background">
	
			<h1>Διαχείριση χρηστών </h1>
			<table border="1" >
	
				<tr>
					<td><img src="eikones/registered.png"  > </a></td>
					<td><img src="eikones/add_users.png"  > </a></td>	
					<td><img src="eikones/delete_users.png"  > </a></td>
					<td><img src="eikones/update_users.png"  > </a></td>				
				
				</tr>
				<tr>
						<td><input id="koumpi" name="User" type="submit" value="Εγγεγραμμένοι χρήστες" length="5"/></td>	
					<td><input id="koumpi" name="adduser" type="submit" value="Εισαγωγή χρήστη" length="5"/></td>
					<td><input id="koumpi" name="deleteuser" type="submit" value="Διαγραφή χρήστη" length="5"/></td>
					<td><input id="koumpi" name="updateuser" type="submit" value="Ενημέρωση χρήστη" length="5"/></td>
				</tr>
	
			</table>
		</div>
	</form>
	
<form action="adminsetmovies.php" method="POST">
	<div id="dimiourgia" class="background">
	
		<h1> Διαχείριση ταινιών </h1>
		<table border="1">
			<tr>
				<td><img src="eikones/movielist.png"  > </a></td>	
				<td><img src="eikones/add_movie.png"  > </a></td>	
				<td><img src="eikones/delete_movie.png"  > </a></td>
				<td><img src="eikones/update_movie.png"  > </a></td>			
			</tr>
			<tr>
				<td><input id="koumpi" name="movieslist" type="submit" value="Λιστα ταινιων " length="5"/></td>
				<td><input id="koumpi" name="addmovies" type="submit" value="Προσθήκη ταινίας " length="5"/></td>
				<td><input id="koumpi" name="deletemovies" type="submit" value="Διαγραφή ταινίας " length="5"/></td>
				<td><input id="koumpi" name="updatemovies" type="submit" value="Ενημέρωση ταινίας " length="5"/></td>
			</tr>
		</table>
	</div>
</form>

<form action="adminsetseries.php" method="POST">
	<div id="dimiourgia2" class="background">
		<h1>Διαχείριση σειρών </h1>
		<table border="1">
			<tr>
				<td><img src="eikones/serieslist.png"  > </a></td>	
				<td><img src="eikones/add_series.png"  > </a></td>	
				<td><img src="eikones/delete_series.png"  > </a></td>	
				<td><img src="eikones/update_series.png"  > </a></td>
			</tr>
			<tr>
				<td><input id="koumpi" name="serieslist" type="submit" value="Λιστα σειρών " length="5"/></td>
				<td><input id="koumpi" name="addseries" type="submit" value="Προσθήκη σειράς " length="5"/></td>
				<td><input id="koumpi" name="deleteseries" type="submit" value="Διαγραφή σειράς " length="5"/></td>
				<td><input id="koumpi" name="updateseries" type="submit" value="Ενημέρωση σεράς " length="5"/></td>
			
				</tr>
		</table>
	</div>
</form>

</body>

</html>