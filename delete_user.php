 <style>
 
	table {
		width: 100%;
		color: white;
		font-family: monospace;
		font-size: 20px;
		text-align: center;
		border-collapse: separate;
		border-spacing: 1px;

	} 

	th {
		background-color:  #323030;
		color: white;
    }
	
	table tr:nth-child(odd) td{
		background-color: rgba(0, 0, 0, 0.8);
		color: white;
	}
	table tr:nth-child(even) td{
		background-color: rgba(66, 187, 191, 0.85);
		color: white;
	}
	
	img {
		width: 280px;
		height: 380px;
	}
	
 </style>
<html>

<body background="eikones/register.jpg">
<div align="Center" >
	<form action="deletexrhsth.php" method="POST">		
  
			 
		<font color="white"> <h1>  Διαγραφή χρήστη με βάση το: </h1> </font>
		<select name="choice">
							<option value="id">id</option>   				  	
							<option value="Username">username</option> 
							<option value="email">email</option> 	
		</select>
		<input type="text" name="deletevalue" required="required" ><p>
		<input type="submit" value=" Επιλογή">
	</form>
</div>
	
 <table>
 <tr>
	<th>Username</th> 
	<th>Name</th>
	<th>Surname</th>
	<th>Email</th>
	<th>City</th>
	<th>Phone_number</th>
	<th>Password</th>
	<th>Id</th>
 </tr>
 
   <?php
    
	//Creates a connection with the database.
	$link = mysqli_connect(" ", " ", " ", " ");
    //Checks if the connection failed. If it did, show error message.
    if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	} 
	//Checks if there are users in the database.
	$sql = "SELECT * FROM users";
	$result = $link->query($sql);
	//If there are, it fetches the users' data and shows them on screen.
	if ($result->num_rows > 0) {
		// output data of each row.
		while($row = $result->fetch_assoc()) {
			echo "<tr>
				<td>" . $row["username"] . "</td>
				<td>" . $row["first_name"]. "</td>
				<td>" . $row["last_name"]. "</td>
				<td>".$row["email"]. "</td>
				<td>".$row["city"]. "</td>
				<td>".$row["phone"]. "</td>
				<td>".$row["password"]. "</td>
				<td>".$row["id"]. "</td>
				</tr>";
		}
		echo "</table>";
	} 
	//Otherwise show error message.
	else{ 
		echo "0 results"; 
	}
	$link->close();
	?>
</table>

</body>
</html>