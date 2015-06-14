<!DOCTYPE html>


<html>
<head> <title>Login</title> 
<link rel="stylesheet" href="bootstrap/css/bootstrap.css"  type="text/css"/>
<link rel="stylesheet" href="moj.css"  type="text/css"/>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
 <script src="bootstrap/js/bootstrap.js"></script></head>

<body>
<div class="container">
	<div class="row">
		<div class="span8"> <h3> Zlatina kuća delicija </h3></div>
		<div class="span4"> <div class="korisnik"> Korisnik  <button class="btn btn-default"> Odjava </button> </div>
	</div>
</div>
<div class="row">
<div class="span4"> 

<ul class="nav nav-pills nav-stacked">
	<li><a href="#"> Meni</a><li>
	<li><a href="#"> Meni</a><li>
	<li><a href="#"> Meni</a><li>
	<li><a href="#"> Meni</a><li>

</ul>



 </div>
		<div class="span8"> 


 <?php

$korisnik=$_GET['username'];
$lozinka=$_GET['password'];


print "<h5>Upisano je korisničko ime:{$korisnik} i lozinka: {$lozinka}!</h5>"; 



?>

</div>
</body>


</div>
 
 <div id="footer">
 <div class=" navbar-fixed-bottom">
    <p class="muted credit"><center>Copyright ZKD, 2015.</center></p>
 </div>

</html>