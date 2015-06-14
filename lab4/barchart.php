<html> 
<head> 
<title>Zlatine kućne delicije</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.css"  type="text/css"/>
<link rel="stylesheet" href="mojcss.css"  type="text/css"/> 
</head> 
<body> 
<?php 
    
   
include ('spajanjenabazu.php');

$konekcija = mysqli_connect($host, $username, $password, $nazivbaze) 
            or die('Ne mogu se spojiti na server!'); 
$konekcija->set_charset('utf8');

$upit="SELECT tip,COUNT(naziv) as broj FROM slastice GROUP BY tip";

$result = mysqli_query($konekcija, $upit);

$vrijednosti=array("");
$nazivi=array("");
while($row = mysqli_fetch_array($result)) {

    array_push($vrijednosti,$row['broj']);
array_push($nazivi,$row['tip']);

    }



        $max = 0; 
        for ($i=0;$i<sizeof($vrijednosti);$i++){ 
          if ($vrijednosti[$i] > $max)$max=$vrijednosti[$i];  // find the largest data 
        } 
        $im = imagecreate(320,255); // width , height px 

        $white = imagecolorallocate($im,255,255,255); // 
        $black = imagecolorallocate($im,0,0,0);   // 
        $red = imagecolorallocate($im,255,0,0);   // 
     
        $blue = imagecolorallocate($im,0,0,255);  // 
  

        //draw X, Y Co-Ordinate 
        imageline($im, 10, 5, 10, 230, $black ); 
        imageline($im, 10, 230, 300, 230, $black ); 

        //Print X, Y 
        imagestring($im,3,15,5,"kolicina",$black); 
        imagestring($im,3,280,240,"vrste",$black); 
         

        // what next draw the bars 
        $x = 5;    // bar x1 position 
        $y = 230;    // bar $y1 position 
        $x_width = 20;  // width of bars 
        $y_ht = 0; // height of bars, will be calculated later 
        

        for ($i=0;$i<7;$i++){ 
          $y_ht = ($vrijednosti[$i]/$max)* 100;  
          imagefilledrectangle ($im,$x,$y,$x+$x_width,($y-$y_ht),$red); 
          imagestring( $im,3,$x,$y,$nazivi[$i],$black); 

           
          $x += ($x_width+20);   // 20 is diff between two bars; 
          
        } 
        imagejpeg( $im, "barSlastice.jpeg", 90); 
        imagedestroy($im); 
        echo "<img src='barSlastice.jpeg'><p></p>"; 
  
?> 
</body> 
</html>