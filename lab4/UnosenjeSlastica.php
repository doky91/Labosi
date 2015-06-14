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
<head> <title>Osobni podaci</title> 
<link rel="stylesheet" href="bootstrap/css/bootstrap.css"  type="text/css"/>
<link rel="stylesheet" href="mojcss.css"  type="text/css"/>
</head>


<body>
<?php
include('spajanjenabazu.php');

	$konekcija = mysqli_connect($host, $username, $password, $nazivbaze) 
				or die('Ne mogu se spojiti na server!'); 
	$konekcija->set_charset('utf8');



$upi="SELECT * from korisnik WHERE korisnickoIme= $korisnik && lozinka"

?>

<?php
	
	$naziv=$_POST['naziv'];
	$tip=$_POST['tip'];
	$opis=$_POST['opis'];
	$veggie=$_POST['veggie'];
	$hall=$_POST['hall'];
	$kosh=$_POST['kosh'];
	$svi= $_POST['compare']; 

$querydelicije="SELECT * FROM delicije WHERE naziv='$tip'";

	$resultdelicije = mysqli_query($konekcija, $querydelicije);

/*
while($rowd = mysqli_fetch_array($resultdelicije)){

	if($rowd['naziv']==$tip)
		$tip=$rowd['naziv'];
	else $tip="";
}*/

if($resultdelicije==null) $tip="";




$tmp="";
foreach ($svi as $value)
{

	$queryalergeni="SELECT * FROM alergeni WHERE vrste='$value'";
	$resultalergeni = mysqli_query($konekcija, $queryalergeni);

if($resultalergeni==null) $tip="";






    if (!$tmp)
    {
        $tmp = $value;
    }
    else
    {
        $tmp .= ',' . $value;
    }
}



	$cijena=$_POST['cijena'];



				$query =  "INSERT INTO `slastice`(`naziv`,`tip`,`opis`,`vegeterijanski`,`halal`,`koser`,`alergeni`,`cijena`) VALUES 
				('$naziv','$tip','$opis','$veggie','$hall','$kosh','$tmp','$cijena')";
				
	$result = mysqli_query($konekcija, $query);


	echo "Uspješno uneseno ako želite ponovo unijeti pritisnite";
	$link_address="FormaUnos.php";
	echo "<a href='$link_address'> ovdje!</a>";

/*
	echo "<br/>";
	echo "Uneseni naziv slastice je:".$naziv;
	echo "<br/>";
	echo "Uneseni tip slastice je:".$tip;
	echo "<br/>";
	echo "Uneseni opis slastice je:".$opis;
	echo "<br/>";
	echo "Vegeterijanski meni:".$veggie;
	echo "<br/>";
	echo "Košer:".$kosh;
	echo "<br/>";
	echo "Alergeni su:".$tmp;
	echo "<br/>";
	echo "Cijena je:".$cijena;

*/



	?>

	</body>

	 <div id="footer">
 <div class=" navbar-fixed-bottom">
    <p class="muted credit"><center>Copyright ZKD, 2015.</center></p>
 </div>

</html>