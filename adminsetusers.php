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
	img
	{
		width: 280px;
		height: 380px;
	}
	
 </style>
 
 <html>

<body background="eikones/register.jpg">
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
	
	//If the admin pressed to check the uaers list.
	if (isset($_POST['User']))
	{
		//Create a connection with the database.
		$link = mysqli_connect(" ", " ", " ", " ");
		//Check if the connection failed. If it did, show error message.
		if($link === false){
			die("ERROR: Could not connect. " . mysqli_connect_error());
		} 
		
		//Check if there are any users in the users table.
		$query = "SELECT * FROM users";
		$result = mysqli_query($link,$query);
		//If there are, fetch each series' data.
		if ($result->num_rows > 0) {
			// output data of each row
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
		//Else show 0 results message.
		else{ 
			echo "0 results"; 
		}
		$link->close();
	}
	
	//If the admin pressed to add a user's entry to the user list.
	else if (isset($_POST['adduser']))
	{
		header("location: caccounts_byadmin.php");
	}
	
	//If the admin pressed to delete a user's data from the user list.
	else if (isset($_POST['deleteuser']))
	{	
		header("location: delete_user.php");
			
	}
	
	//If the admin pressed to update a user's data.
	else if (isset($_POST['updateuser']))
	{
		header("location: update_user.php");
	}
	else{
			echo"failure";
		}	
?>
</table>
</body>
</html>
