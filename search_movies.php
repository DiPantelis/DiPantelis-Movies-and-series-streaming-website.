 <style>
 
	table {
		border-collapse: collapse;
		width: 100%;
		color: white;
		font-family: monospace;
		font-size: 25px;
		text-align: left;
	} 
	 
	th {
		background-color:  #323030;
		color: white;
	}
	
	table tr:nth-child(odd) td{
		background-color:  #323030;
		color: white;
	}
	
	table tr:nth-child(even) td{
		background-color:   #42bbbf  ;
		color: white;
	}

	img
	{
		width: 420px;
		height: 380px;
	}
	
	fieldset {
		background-color:    #541043   ;
		color: white;
	}
	
 </style>
 
<html>
	<body background="eikones/cinema2.jpg">


		<div align="Center" >
			<fieldset >
				<form action="search_tainia.php" method="POST">		
		  
					 
					<font color="white"> <h1> Επιλέξτε τον τρόπο αναζήτησης της ταινίας και κατόπιν συμπληρώστε το πεδίο αναζήτησης. </h1> </font>
					<font color="white"> <h1>Αναζήτηση ταινίας βάσει: </h1> </font>
					<select name="choice2">
									<option value="moviename">ονόματος</option> 
									<option value="releaseyear">έτους κυκλοφορίας</option> 
									<option value="director">σκηνοθέτη</option> 
									<option value="cast">ηθοποιών</option> 
									<option value="genre">είδους</option>   				  	
									<option value="rating">βαθμολογίας</option> 
					</select>
					<font size=4 > <strong></strong></font> <input type="text" name="searchvalue" required="required" ><p>
					<input type="submit" value=" Επιλογή">
				</form>
			</fieldset>
		</div>

	</body>
</html>