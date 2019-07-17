<?php

$promo=$_GET['promo'];
$nouveau="";
$gestion=fopen("listapprenants.txt", "r");
while (!feof($gestion)) {
    $ligne=fgets($gestion);
    $col=explode(",", $ligne);
    if ($promo==$col[6]) {
        if ($col[6]=='bloquer') {

            $col[6]='debloquer';
            
        }
        else {
            $col[6]='bloquer';
        }
        $recup=$col[0].",".$col[1].",".$col[2].",".$col[3].",".$col[4].",".$col[5].",".$col[6].",".$col[6].",\n";
     }
      else{
            $recup=$ligne; 
    }
    $nouveau.=$recup;
    }
fclose($gestion);
$gestion=fopen('listapprenants.txt', "w"); 
fputs($gestion,trim($nouveau));
header("location:statut.php");

?>