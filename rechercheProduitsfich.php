<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="stylee.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>RECHERCHE PRODUIT</title>
    <nav>

    <ul>
        <li><a href=rechercheProduits.php>  RECHERCHE PRODUIT</a></li>
        <li><a href=ajouteProduit.php> AJOUTER PRODUIT</a></li>
        <li><a href=supprimeProduits.php> SUPPRIMER PRODUIT</a></li>
        <li><a href=updateProduit.php> UPDATE PRODUIT</a></li>
        <li><a href=listerProduits.php> LES PRODUITS</a></li>
        <li><a href=login.php> DECONNEXION</a></li>
    </ul>
    </nav>  <br>
</head>

<body>
    <p>
    <h1>RECHERCHE D'UN PRODUIT</h1>
    <form action="" method="POST">
        rechercher un produit

        quantite<input type="number"name="quantite">

        prixmin<input type="number" name="prixMn">

        prixmax<input type="number" name="prixMx">


        <input type=submit value="rechercher" name="envoyer">
</form>
<br><br><br>

<?php
$qte = $_POST['quantite'];
$pmax = $_POST['prixMx'];
$pmin = $_POST['prixMn'];
if (isset($_POST['envoyer'])) {
    $montab = fopen("prodfich.txt", "r");
    echo "<table class = 'table'>";
    echo "<tr><th>PRODUIT</th><th>PRIXU</td><th>QUANTITE</th><th>MONTANT</th></tr>";
    while (!feof($montab)) {
        $ligne=fgets($montab);
        $col=explode(",", $ligne);
        if ($qte >= $col[2] && $qte !="" && $pmax == "" && $pmin == "" && $qte>0) {
            if ($col[2]<10) {
                echo "<tr class='rouge'><td>$col[0]</td><td>$col[1]</td><td>$col[2]</td><td>$col[3]".$col[1]*$col[2]."</td></tr>";
            } else {
                echo "<tr><td>$col[0]</td><td>$col[1]</td><td>$col[2]</td><td>$col[3]".$col[1]*$col[2]."</td></tr>";
            }
        }
        elseif ($pmin <= $col[1] && $pmax == "" && $pmin !="" && $qte == "" && $pmin > 0){
            if ($col[2]<10) {
                echo "<tr class='rouge'><td>$col[0]</td><td>$col[1]</td><td>$col[2]</td><td>$col[3]".$col[1]*$col[2]."</td></tr>";
            } else {
                echo "<tr><td>$col[0]</td><td>$col[1]</td><td>$col[2]</td><td>$col[3]".$col[1]*$col[2]."</td></tr>";
            }
        }
        elseif(($pmax <= $col[1] && $pmin == "" && $qte == "" && $pmax > 0)){
            if ($col[2]<10) {
                echo "<tr class='rouge'><td>$col[0]</td><td>$col[1]</td><td>$col[2]</td><td>$col[3]".$col[1]*$col[2]."</td></tr>";
            } else {
                echo "<tr><td>$col[0]</td><td>$col[1]</td><td>$col[2]</td><td>$col[3]".$col[1]*$col[2]."</td></tr>";
            }
        }
        elseif($pmin <= $col[1] && $pmax >= $col[1] && $pmax > $pmin && $pmax != "" && $pmin != "" && $qte == "" && $pmin > 0 && $pmin > 0){
            if ($col[2]<10) {
                echo "<tr class='rouge'><td>$col[0]</td><td>$col[1]</td><td>$col[2]</td><td>$col[3]".$col[1]*$col[2]."</td></tr>";
            } else {
                echo "<tr><td>$col[0]</td><td>$col[1]</td><td>$col[2]</td><td>$col[3]".$col[1]*$col[2]."</td></tr>";
            }
        }
        elseif($qte <= $col[2] && $pmin <= $col[1] && $pmax >= $col[1] && $pmax > $pmin && $pmax != "" && $pmin != "" && $qte != "" && $pmin > 0 && $pmin > 0 && $qte > 0){
            if ($col[2]<10) {
                echo "<tr class='rouge'><td>$col[0]</td><td>$col[1]</td><td>$col[2]</td><td>$col[3]".$col[1]*$col[2]."</td></tr>";
            } else {
                echo "<tr><td>$col[0]</td><td>$col[1]</td><td>$col[2]</td><td>$col[3]".$col[1]*$col[2]."</td></tr>";
            }
        }
    }
    echo"</table>";
    fclose($montab);
}
    ?>
</table>

</body>
</html>