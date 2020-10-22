<html >
<style>

h1  {
  
  color: white;
}
body {
  background-image: url('eikones/series.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position:center top;
}
</style>
 <div align="center">
 <h1 > <font> Εισαγωγή σειράς</font></h1>
 
<body >
<form action="addseries.php" method="post">
	<p>
        <h1><label for="seriesname"><font  size=5 >Όνομα σειράς:</font></label></h1>
        <input type="text" style="width:200px; height:30px;"  name="seriesname" id="seriesname"required="required">
    </p>
    <p>
        <h1><label for="description"><font size=5 >Περιγραφή:</font></label></h1>
       <textarea cols="10"  rows="10" <input type="text"   style="width:400px; height:120px;"  name="description"  id="description" value="" /> 
       </textarea>
    </p>
    <p>
        <h1><label for="releaseyear"><font size=5 >Έτος κυκλοφορίας:</font></label></h1>
        <input type="text" style="width:200px; height:30px;" name="releaseyear" id="releaseyear"  required="required">
    </p>
	 <p>
        <h1><label for="director"><font  size=5 >Σκηνοθεσία:</font></label></h1>
        <input type="text" style="width:200px; height:30px;" name="director" id="directorid"  required="required">
    </p>
	 <p>
        <h1><label for="cast"><font  size=5 >Πρωταγωνιστούν:</font></label></h1>
        <input type="text" style="width:200px; height:30px;" name="cast" id="castid"  required="required">
    </p>
	
	 <p>
        <h1><label for="genre"><font  size=5 >Είδος:</font></label></h1>
        <input type="text" style="width:200px; height:30px;" name="genre" id="genreid"  required="required">
    </p>
	 <p>
        <h1><label for="genre"><font  size=5 >Βαθμολογια:</font></label></h1>
        <input type="text" style="width:200px; height:30px;" name="rating" id="ratingid"  required="required">
    </p>
	<p>
        <h1><label for="comments"><font  size=5 >Σχόλια σειράς:</font></label></h1>
       <textarea cols="10"  rows="10" <input type="text"   style="width:400px; height:120px;"  name="comments"  id="commentsid" value="" /> 
       </textarea>
    </p>
	<p>
        <h1><label for="duration"><font  size=5 >Μέση διάρκεια επεισοδίου:(π.χ.:1.40 ,μία ώρα και 40 λεπτά)</font></label><br>
        <input type="text" style="width:200px; height:30px;" name="duration" id="durationid"  required="required">
    </p>
	<p>
        <h1><label for="imagelink"><font size=5  >Εικόνα σειράς(URL/PATH):</font></label></h1>
        <input type="text" style="width:200px; height:30px;" name="imagelink" id="imagelinkid"  required="required">
    </p>
	<p>
        <h1><label for="releaseyear"><font  size=5 >Πλήθος σεζόν:</font></label></h1>
        <input type="text" style="width:200px; height:30px;" name="numberofseasons" id="numberofseasonsid"  required="required">
    </p>
	<p>
        <h1><label for="releaseyear"><font  size=5 >Πλήθος επεισοδίων:</font></label></h1>
        <input type="text" style="width:200px; height:30px;" name="numberofepisodes" id="numberofepisodes"  required="required">
    </p>
	<p>
        <h1><label for="videolink"><font size=5  >Video σειράς(URL/PATH):</font></label></h1>
        <input type="text" style="width:200px; height:30px;" name="videolink" id="videolinkid"  required="required">
    </p>
    <input type="submit" value="Εισαγωγή σειράς">
</form>
</div>
</body>
</html>