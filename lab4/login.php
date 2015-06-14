<?php
session_start();

$user = $_POST["user"];
$pass=$_POST["pass"];


 include('spajanjenabazu.php');
$konekcija = mysqli_connect($host, $username, $password, $nazivbaze) ;

$konekcija->set_charset('utf8');


$upi = "SELECT * FROM korisnik WHERE korisnickoIme='$user' and lozinka='$pass'"; 

$rez=mysqli_query($konekcija, $upi);

$broj=mysqli_num_rows($rez);

if($broj>0){

$_SESSION['username'] = $user;

session_write_close();

$newURL="IspisPonudeURestoranu.php";
header('Location: '.$newURL);exit;
}

else {
/*$novo="login.html";
	header('Location: '.$novo);
*/
}
?>