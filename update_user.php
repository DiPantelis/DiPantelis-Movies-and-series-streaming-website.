<html>

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

	<body background="eikones/register.jpg">
		<div align="Center" >
			<form action="update_xrhsth.php" method="POST">		
					 
				<font color="white"> <h1> Εισάγετε το id του χρήστη για τον οποίο θα γίνει ενημέρωση στοιχείων : </h1> </font>
				<font size=4 color="white"> <strong></strong> Id χρήστη: </font> <input type="text" name="userid" required="required" ><p>
				<font color="white"> <h1> Επιλέξτε το πεδίο που θέλετε να αλλάξετε και κατόπιν εισάγετε την νέα του τιμή </h1> </font>
				<select name="choice2">
														
									<option value="username">Username</option> 
									<option value="name">Name</option> 
									<option value="surname">Surname</option> 
									<option value="email">Email</option> 
									<option value="city">City</option> 
									<option value="phone">Phone_number</option> 
									<option value="id">id</option>   				  	
									
				</select>
				<font size=4 > <strong></strong></font> <input type="text" name="updatevalue" required="required" ><p>
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
			
			//Get all records of the users from the users table.
			$sql = "SELECT * FROM users";
			$result = $link->query($sql);
			if ($result->num_rows > 0) {
			//Output data of each row.
				while($row = $result->fetch_assoc()) {
					echo "<tr>
						<td>" . $row["username"] . "</td><td>" . $row["first_name"]. "</td>
						<td>" . $row["last_name"]. "</td><td>".$row["email"]. "</td><td>".$row["city"]. "</td>
						<td>".$row["phone"]. "</td><td>".$row["password"]. "</td><td>".$row["id"]. "</td>
						</tr>";
				}
				echo "</table>";
			} 
			else{ 
				echo "0 results"; 
			}
			$link->close();
			?>
		</table>

	</body>
</html>