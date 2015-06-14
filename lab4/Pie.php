<?php
   
include ('spajanjenabazu.php');

$konekcija = mysqli_connect($host, $username, $password, $nazivbaze) 
      or die('Ne mogu se spojiti na server!'); 
$konekcija->set_charset('utf8');

$upit="SELECT tip,COUNT(naziv) as broj FROM slastice GROUP BY tip";

$result = mysqli_query($konekcija, $upit);

$vrijednosti=array("");

while($row = mysqli_fetch_array($result)) {

    array_push($vrijednosti,$row['broj']);
  // echo $row['broj'];
   //echo "<br>";

    }
$total=array_sum($vrijednosti);


for($i=0;$i<count($vrijednosti);$i++)
{
$arc[$i]=$vrijednosti[$i]*360/$total;
}
 
$image = imagecreatetruecolor(550,550);
$style=IMG_ARC_PIE;

// boje
$white    = imagecolorallocate($image, 0xFF, 0xFF, 0xFF);
$gray     = imagecolorallocate($image, 0xC0, 0xC0, 0xC0);
$darkgray = imagecolorallocate($image, 0x90, 0x90, 0x90);
$navy     = imagecolorallocate($image, 0x00, 0x00, 0x80);
$darknavy = imagecolorallocate($image, 0x00, 0x00, 0x50);
$red      = imagecolorallocate($image, 0xFF, 0x00, 0x00);
$darkred  = imagecolorallocate($image, 0x90, 0x00, 0x00);

$colors=array($gray,$navy,$darknavy,$darkred,$white,$darkgray,$red );

$start=0;

for($j=0;$j<count($vrijednosti);$j++)
{
imagefilledarc($image, 250, 250, 500, 250, $start, $start+$arc[$j], $colors[$j], $style);
$start=$start+$arc[$j];
}
 
// flush image
header('Content-type: image/png');
imagepng($image);
imagedestroy($image);
?>
