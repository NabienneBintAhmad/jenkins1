<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style1.css">
</head>
<nav>
        <label for="menu" class="menu">Menu</label>
        <input type="checkbox" id="menu" role="button">
        <ul>
            <li><a href="liste.php">Acceuil</a></li>
            <li><a href="liste.php"> Produits </a></li>
            <li><a href="ajouter1.php">Ajouter </a></li>
            <li><a href="update.php">Modifier  </a></li>
            <li><a href="rechercher.php">Rechercher  </a></li>
            <li><a href="supprimer.php">Supprimer  </a></li>
            <li><a href="logout.php">Déconnexion</a></li>
        </ul>
        </ul>
    </nav> <br> <br> <br>
</head>
<body>
<form action="modifier.php" method="POST" >

<p>produit: </p>
<input type="text" name="produit" id="log" required>
<p>prix unitaire </p>
<input type="number" name="pu" id="pu" required><br><br>
<p>quantite</p>
<input type="number" name="Q" id="Q" required><br><br>

<input type="submit" value="MODIFIER" name="MODD" >
  
</form>
<?php


if (isset($_POST['MODD'])) {
    $produits=fopen("produits.txt", "r");
    $nm=$_POST['produit'];
    $qt=$_POST['Q'];
    $pr=$_POST['pu'];
    while ($ligne=fgets($produits)) {
        $col=explode(",",$ligne);
        if ($col[0]==$nm) {
            $col[2]=$qt;
            $col[1]=$pr;
            $col[3]=$qt*$pr;
            $modifier=$nm.",".$pr.",".$qt.",".$col[3];
        } else {
            $modifier=$ligne;
        }
        $newligne=$newligne.$modifier;
    }
    fclose($produits);
    $prod=fopen("produits.txt","w+");
    fwrite($prod,trim($newligne));
    echo "<tr><th>PRODUITS</><th>PRIX UNITAIRE</th><th>QUANTITE</th><th>MONTANT</th></tr>";
    fclose($prod);
}


        $montab = fopen("produits.txt", "r");
        echo "<table class='table2'>";
        while(!feof($tab)){
           
            $text=fgets($produits);
            if ($text=="") {
            } else {
                $ligne=explode(",",$text);
                $ligne[3]=$ligne[1]*$ligne[2];
                if ($ligne[2]<10) {
                    echo "<tr class='rouge'><td>$ligne[0]</td><td>$ligne[1]</td><td>$ligne[2]</td><td>$ligne[3]</td></tr>";
                } else {
                    echo "<tr><td>$ligne[0]</td><td>$ligne[1]</td><td>$ligne[2]</td><td>$ligne[3]</td></tr>";
                }
            }
        }

        echo "</table>";

        fclose($montab);

?>
        </body>
        </html>