
<?php
require('tfpdf.php');


$trazenje=$_POST['trazenje'];

$pdf = new tFPDF();
$pdf->AddPage();
$pdf->SetAuthor('Dolores Škugor');

// dodaj Unicode font (UTF-8)
$pdf->AddFont('DejaVu','','DejaVuSans.ttf',true);
$pdf->SetFont('DejaVu','',14);


include ('spajanjenabazu.php');
$konekcija = mysqli_connect($host, $username, $password, $nazivbaze) 
      or die('Ne mogu se spojiti na server!'); 
$konekcija->set_charset('utf8');
$query =  "SELECT naziv,opis FROM slastice";
      
$result = mysqli_query($konekcija, $query) or die('ne radi!');

$pdf->Write(0,'Zlatina kuća delicija-tražene slastice su:'); 
$pdf->Ln(10);

while($row = mysqli_fetch_array($result)) {

	
if(strpos($row['naziv'],$trazenje) !== false)
{

$sve=$row['naziv'].' - '.$row['opis'];
 $pdf->Write(0,$sve);
 $pdf->Ln(10);
}



elseif(strpos($row['opis'],$trazenje) !== false)

{
$sve=$row['naziv'].' - '.$row['opis'];
 $pdf->Write(0,$sve);
 $pdf->Ln(10);



}
else{}
}


$pdf->Output();




?>