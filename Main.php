
<html>
	<head>
		<title>M&S Online </title>
		<style>
			img {
			  display: block;
			  margin-left: auto;
			  margin-right: auto;
			  margin-top: -10px;
			  margin-bottom: -10px;
			}
		
			body {
				background: black;
				background: linear-gradient(bottom, rgba(0,0,0,1), rgba(0,0,0,.4));
				background: -webkit-linear-gradient(bottom, rgba(0,0,0,1), rgba(0,0,0,.4));
				background: -moz-linear-gradient(bottom, rgba(0,0,0,1), rgba(0,0,0,.4));
				position: relative;
				height: cover;
				width:cover;
				margin: 0;
			}
			
			fieldset {
			  background-color:    #541043   ;
			  color: white;
			}
			
			a { 
				color: white; 
			}

			.layer {
				 	
			}
			
			.background{
				background-image: url("eikones/bgmain.jpg");
				margin: -40px auto;
				width: 100%;
				height= cover;
			}
			
		</style>
		
	</head>
	<body >
		<div class="background">
			<div >
				<img class="layer" src="eikones/logot4.png" style="width: 25%; height:35%; " >
			</div>
		</div>
	
		<div class="">
		    <form action="mns22/login.php" method="POST">	
				<fieldset >
					 <legend> <strong> <font size=5 >Log in: </font> </strong> </legend>
					 
							<font size=4 > <strong> Username:</strong> </font> <input type="text" name="username" required="required" ><p>
							<font size=4 > <strong> Password:</strong> </font> <input type="password" name="password" required="required" ><p>		
	  
					  <input type="submit" value="Log In"> 
						<select name="epilogi">
								<option value="User">User</option>   				  	
								<option value="Administrator">Administrator</option>   				  	 				  	
						</select>
						<a href="mns22/caccounts.php"/>New user?Create an account</a>
				</fieldset>		
			</form>
		</div>
	<div >
			<img src="eikones/bgmain.jpg" width="100%" height="cover">
	</div>
	</body>
</html>
