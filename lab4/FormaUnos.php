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
<head> <title>Unos novog proizvoda</title> 
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

 <div class="row">
		<div class="span8"> 
	<form role="form" action="UnosenjeSlastica.php" method="POST">
<div class="form-group">
	<label> Naziv proizvoda: </label>
		<input type="text" name="naziv">	
		</div>

	<div class="form-group">
	<label> Tip proizvoda: </label>
		<select name="tip"> Izaberi 	

<?php

include('spajanjenabazu.php');

$konekcija = mysqli_connect($host, $username, $password, $nazivbaze) 
			or die('Ne mogu se spojiti na server!'); 
$konekcija->set_charset('utf8');
$query =  "SELECT naziv FROM delicije";
			
$result = mysqli_query($konekcija, $query);


while($row = mysqli_fetch_array($result)) {

 echo "<option value=$row[0]>  $row[0]</option>" ; 

}



?>


</select>

		</div>

<div class="form-group">
	<label> Opis proizvoda: </label>
		<input type="text" name="opis">
			</div>

 

<div class="form-group">
	<label class="control label"> Vegeterijanski: </label>
 <input type="radio" name="veggie" value="Da">Da

<input type="radio" name="veggie" value="Ne">Ne
			</div>

 <div class="form-group">
	<label class="control label"> Halal: </label>
 <input type="radio" name="hall" value="Da">Da

<input type="radio" name="hall" value="Ne">Ne
			</div>

<div class="form-group">
	<label class="control label"> Košer: </label>
 <input type="radio" name="kosh" value="Da">Da

<input type="radio" name="kosh" value="Ne">Ne
			</div>

<div class="form-group">
	<label> Tipovi alergena: </label>
	<?php 



	$query =  "SELECT vrste FROM alergeni";
			
$result = mysqli_query($konekcija, $query);

$br=0;
while(	$row = mysqli_fetch_array($result))
{
$br++;
 
    echo '<input type="checkbox" value="'.$row[0].'" name="compare[]"  />'.$row[0] ; 
 
 if ($br%3==0) echo "<br>";

}

?>
<br>
			</div>

<div class="form-group">
	<label> Cijena proizvoda: </label>
		<input type="number" name="cijena">
			</div>


<br/>
		<button type="submit" class="btn btn-default">Unesi novi proizvod</button>
	
	</form>




	</div>
</div>
</div>
</body>


</div>
 
  <div id="footer">
 <div class=" navbar-fixed-bottom">
    <p class="muted credit"><center>Copyright ZKD, 2015.</center></p>
 </div>


</html>