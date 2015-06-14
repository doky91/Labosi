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
		<div onmouseover="otkrij('osobnipodaci');" onmouseout="sakrij('osobnipodaci');">	
	
		<h2> <span>Osobni podaci</span></h2>
			<div id="osobnipodaci">
		<p> Dolores Škugor, Šibenik, 30.10.1991.</p> <br/>
		</div> </div>

		<div onmouseover="otkrij('skolovanje');" onmouseout="sakrij('skolovanje');">
		<h2 > <span>Podaci o školovanju </span></h2>
		<div id="skolovanje">
		<p> Osnovna škola Jurja Šižgorića,Šibenik </p>
		<p> Tehnička škola Šibenik </p>
		<p>Tehničko veleučilište u Zagrebu </p> <br/>
	</div></div>
		
		<div onmouseover="otkrij('znanja');" onmouseout="sakrij('znanja');">
		<h2 > <span>Znanja i vještine </span></h2>
		<div id='znanja'>
		<p>HTML,CSS,PHP,JAVA,ASP.NET</p></div></div>
	</div>
</div>
</body>
<script>

function otkrij(name){
console.log(document.getElementById(name));

document.getElementById(name).style.visibility="hidden";

}

function sakrij(name){


document.getElementById(name).style.visibility="visible";

}

</script>

</div>
 
 <div id="footer">
 <div class=" navbar-fixed-bottom">
    <p class="muted credit"><center>Copyright ZKD, 2015.</center></p>
 </div>

</html>