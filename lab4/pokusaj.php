<?php
include 'spajanjenabazu.php';









$sql="SELECT date,amount FROM $tablename GROUP BY date"; // Give Your field Name  
$result = mysql_query($sql);
$graphtitle='BarChart';//Graph Title
$xname='Year'; //X-axis Name
$yname='Values';//y-axis name
$img_width=400;//image height
$img_height=300;//image width 
$margins=70;
$ymargin=6;
$count=mysql_affected_rows();
$graph_width=$img_width - $margins * 2;
$graph_height=$img_height - $margins * 2; 
$bar_width=25;
$total_bars=$count;
$gap= ($graph_width- $total_bars * $bar_width ) / ($total_bars +1);
$img=imagecreate($img_width,$img_height);
include 'barcolor.php';
imagefilledrectangle($img,0,0,0,0,$bag_color);
imageline($img,$margins,$img_height-45,$img_width-20,$img_height-45,$xyline_color);
imageline($img,$margins,$ymargin,$margins,$img_height-45,$xyline_color);
$maxvalue="select max(date) as amount from $tablename";//Give your field name for Y axis 
$max=mysql_query($maxvalue);
while($inf1= mysql_fetch_array($max)) 
  {
   $ratio=$graph_height/$inf1[0];
  }
$horizontal_lines=8;
$horizontal_gap=($img_height+20)/$horizontal_lines;
for($j=1;$j<=$horizontal_lines;$j++)
{
        $y=($img_height-48) - $horizontal_gap * $j ;
        //imageline($img,$margins+1,$y,$img_width-20,$y,$hline_color);
        $v=intval($horizontal_gap * $j /$ratio);
        imagestring($img,2,$margins-30,$y-5,$v,$values_color);
}
$i=0;
while($inf = mysql_fetch_array($result)) 
  {
      $x1=($margins+10) + ($gap+5) + $i * ($gap+$bar_width) ;
      $x2=$x1+$bar_width;
      $y1=($img_height-46)- ceil($inf[1] * $ratio) ; 
      $y2=($img_height-46); 
      imagestring($img,2,$x1+1,$y1-15,$inf[1],$values_color); 
      imagestring($img,2,$x2-23,$img_height-43,$inf[0],$values_color);  
      imagefilledrectangle($img,$x1,$y1,$x2,$y2,$bar_color); // Draw bar
   $i++;   
  }
imagestring($img,8, ($img_width-$margin)/2, 0, $graphtitle, $txt_color);
imagestring($img,5, ($img_width-$margin)/2, $img_height-($ymargin+10), $xname, $txt_color);
imagestringup($img,5,10,($img_height-$ymargin)/2, $yname, $txt_color);
//header('Content-type: image/png');
imagepng($img, 'barchart.jpg');
echo "<div style='border:1px solid #d8d8d8;width:$img_width'><img src='barchart.jpg'></div>";
?>