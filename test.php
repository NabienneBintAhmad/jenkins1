<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
$monfichier=fopen('test.txt','r');
echo'<table border=1px solid width=60% weith=60%  class="tab" >';
echo'  <thead >
<tr>
  <th scope="col">nom</th>
  <th scope="col">prix unitaire</th>
  <th scope="col">Quantite </th>
  <th scope="col">montant total </th>
</tr>
</thead>';
while(!feof($monfichier)){
    $ligne=fgets($monfichier);
    $col=explode(";",$ligne);
    echo '<tr>';
    for($i=0;$i<count($col);$i++){
        echo "<td>".$col[$i]."</td>";
    }
   echo '</tr>';
    
}
echo "</table>";
fclose($monfichier);

?>


    
</body>
</html>