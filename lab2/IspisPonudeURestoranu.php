<!DOCTYPE html>


<html>
<head> <title> Ponuda slastica</title> 
<link rel="stylesheet" href="bootstrap/css/bootstrap.css"  type="text/css"/>
<link rel="stylesheet" href="mojcss.css"  type="text/css"/>


<body>
<div class="container">
	<div class="row">
		<div class="span8"> <h3> Zlatina kuća delicija </h3></div>
		<div class="span4"> <div class="korisnik"> Ime korisnika <button class="btn btn-default"> Odjava </button> </div>
	</div>
</div>
<div class="row">
<div class="span4"> 

<ul class="nav nav-pills nav-stacked">
	 <li><a href="FormaUnos.php"> Unos novog proizvoda</a><li>
  <li><a href="IspisPonudeUrestoranu.php"> Naši proizvodi</a><li>
	<li><a href="#"> Meni</a><li>
	<li><a href="#"> Meni</a><li>

</ul>
<label> Unesi pojam za pretraživanje</label>
<form action="#" method="get" onsubmit="return false;">
<input type="text" size="30" name="trazi" id="trazi" value="" onkeyup="kliknuto() " />
</form>

<script>

function kliknuto() {
   var trazi= document.getElementById("trazi");
  var malaslova = trazi.value.toLowerCase();
  var rows = document.getElementsByTagName("tr");

  for ( var i = 0; i < rows.length; i++ ) {
    var jelo= rows[i].getElementsByTagName("td");
    jelo = jelo[0].innerHTML.toLowerCase();
    if ( jelo ) {
        if ( malaslova.length == 0 || (malaslova.length < 2 && jelo.indexOf(malaslova) == 0) || (malaslova.length >= 2 && jelo.indexOf
    (malaslova) > -1 ) ) {
        rows[i].style.display = "";
       
      } else {
        rows[i].style.display = "none";
      }
    }
  }


    }



</script>


 </div>
		<div class="span8"> 
			<h3> U našoj ponudi su navedene slastice: </h3>
		<?php
  $host="localhost";
  $username="root";
  $password="";
  $nazivbaze="zdk";


$konekcija = mysqli_connect($host, $username, $password, $nazivbaze) 
      or die('Ne mogu se spojiti na server!'); 
$konekcija->set_charset('utf8');
$query =  "SELECT naziv,opis FROM slastice";
      
$result = mysqli_query($konekcija, $query);

echo "<table>";

while($row = mysqli_fetch_array($result)) {

 echo "<tr><td>{$row['naziv']}</td><td>{$row['opis']} </td></tr>" ;

}

echo "</table>";



?>
	</div>
</div>
</body>


</div>
 
  <div id="footer">
 <div class=" navbar-fixed-bottom">
    <p class="muted credit"><center>Copyright ZKD, 2015.</center></p>
 </div>

</html>