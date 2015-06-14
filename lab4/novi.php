<?php
$vrijednost=$_POST['vrijednost'];
$akcija=$_POST['akcija'];


 include('spajanje.php');

$konekcija = mysqli_connect($host, $username, $password, $nazivbaze) ;

$konekcija->set_charset('utf8');

if ($akcija==1){
$query="INSERT INTO alergeni(vrste) VALUES('$vrijednost')";
$result = mysqli_query($konekcija, $query);
}


else {
$querytwo="INSERT INTO delicije(naziv) VALUES ('$vrijednost')";
$result = mysqli_query($konekcija, $querytwo);

}



?>