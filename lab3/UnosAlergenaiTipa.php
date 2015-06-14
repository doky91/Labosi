<?php

session_start();
if(isset($_SESSION['username']))
  $korisnik=$_SESSION['username'];

else{ header("Location:login.html");
exit;
}
?>

<!DOCTYPE html>


<html>
<head> <title> Ponuda slastica</title> 
<link rel="stylesheet" href="bootstrap/css/bootstrap.css"  type="text/css"/>
<link rel="stylesheet" href="mojcss.css"  type="text/css"/>
<script type="text/javascript">
function logoutck() {
    var odjava = confirm("Zbilja želiš izaći iz kuće?");
    if (odjava) {
       window.location.href = 'logout.php';
    }
}



</script>
</head>

<body>
<div class="container">
	<div class="row">
		<div class="span8"> <h3> Zlatina kuća delicija </h3></div>
		<div class="span4"> <div class="korisnik"> <?php echo $korisnik?> <button onclick=logoutck() class="btn btn-default"> Odjava </button> </div>
	</div>
</div>
<div class="row">
<div class="span4"> 

<ul class="nav nav-pills nav-stacked">
	 <li><a href="FormaUnos.php"> Unos novog proizvoda</a><li>
  <li><a href="IspisPonudeUrestoranu.php"> Naši proizvodi</a><li>
	<li><a href="Unos alergena i tipa.html"> Meni</a><li>
	<li><a href="#"> Meni</a><li>

</ul>
</div>

	<div class="span8">


<form role="form" action="novi.php" method="post">
<div class="form-group">
<label>Želite unijeti:</label>
<select name="akcija">

<option value="1" > Alergen </option>
<option value="2"> Tip proizvoda </option>

</select>
<div>
	<div class="form-group">
<label>Upišite novu vrijednost:</label>
<input type="text" name="vrijednost">

<div>
<input type="submit" value="Dodaj novi" class="btn btn-default">


</form>
</div>
</div>


</html>
