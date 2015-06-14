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


<body>
<div class="container">
	<div class="row">
		<div class="span8"> <h3> Zlatina kuća delicija </h3></div>
		<div class="span4"> <div class="korisnik"> <?php echo $korisnik?> <button onclick=logoutck() class="btn btn-default"> Odjava </button> </div>
	</div>
</div>
<div class="row">
<div class="span4"> 

 <?php include('meni.php');?>

<label> Unesi pojam za pretraživanje</label>
<form action="#" method="get" onsubmit="return false;">
<input type="text" size="30" name="trazi" id="trazi" value="" onkeyup="kliknuto() " />
</form>

<script type="text/javascript">

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




function logoutck() {
    var odjava = confirm("Zbilja želiš izaći iz kuće?");
    if (odjava) {
       window.location.href = 'logout.php';
    }
}



</script>












 </div>
		<div class="span8"> 
			<h3> U našoj ponudi su navedene slastice: </h3>
		
    <?php

  include('spajanje.php');

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