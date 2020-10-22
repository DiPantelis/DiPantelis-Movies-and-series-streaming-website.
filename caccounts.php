

<html >
<style>

h1  {
  
  color: white;
}
body {
  background-image: url('eikones/register.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position:center top;
}
</style>
 <div align="center">
 <h1>  Δημιουργία νέου χρήστη</h1>
 
<body >
<form action="createaccount.php" method="post">
	<p>
        <h1><label for="userName"><font size=5 >Username:</font></label></h1>
        <input type="text" name="username" id="idusername"required="required">
    </p>
    <p>
        <h1><label for="firstName"><font  size=5  >Όνομα:</font></label></h1>
        <input type="text" name="first_name" id="firstName"  required="required">
    </p>
    <p>
        <h1><label for="lastName"><font size=5 >Επίθετο:</font></label></h1>
        <input type="text" name="last_name" id="lastName"  required="required">
    </p>
    <p>
        <h1><label for="emailAddress"><font  size=5 >Email:</font></label></h1>
        <input type="text" name="email" id="emailAddress"  required="required">
    </p>
	 <p>
        <h1><label for="City"><font  size=5 >Πόλη:</font></label></h1>
        <input type="text" name="city" id="Cityid"  required="required">
    </p>
	 <p>
        <h1><label for="phoneNumber"><font  size=5 >Τηλέφωνο:</font></label></h1>
        <input type="text" name="phone" id="phoneNumber"  required="required">
    </p>
	
	 <p>
        <h1><label for="password"><font  size=5 >Κωδικός:</font></label></h1>
        <input type="text" name="userpass" id="password"  required="required">
    </p>
	
    <input type="submit" value="Εγγραφή">
</form>
</div>
</body>
</html>