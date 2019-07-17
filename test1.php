
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<meta charset="utf-8">
	<title>Accueil</title>

</head>
</head>

<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Menu</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="formulaire_connexion.php">Page de connexion <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="listprod.php">Lister les produit</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Modifications
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="ajoutpro.php">Ajouter un produit</a>
          <a class="dropdown-item" href="suprod.php">Supprimer un produit</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="update.php">Mis à jour de produit</a>
          <a class="dropdown-item" href="rechercher.php">Rechercher un produit</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

    </header>

    <div id="ajout">
    <form class="form-inline my-2 my-lg-0" method="POST" action="">
    <p> Saisissez le Produit à mettre à jour</p>
      <input name="Produits"  class="form-control mr-sm-2" type="text" placeholder="Produit" aria-label="text" required>
      <p>Saisissez son prix</p>
      <input name="Prix"  class="form-control mr-sm-2" type="number" placeholder="Prix" aria-label="number" required>
      <p>Saisissez sa quantité</p>
      <input name="Quantité"  class="form-control mr-sm-2" type="number" placeholder="Quantité" aria-label="number" required>
      <button class="btn btn-outline-success my-2 my-sm-0" name="update" type="submit">update</button>
    </form>
    </div>         
<?php

    $nom=$_POST['Produits'];
    $pri=$_POST['Prix'];
    $kant=$_POST['Quantité'];
   // if(isset($_POST['update'])){
    $update=fopen("test1.txt","r");
    while (!feof($update)) {
    $ligne=fgets($update);
    $col1=explode(":",$ligne);
    //$recup="";
    if($nom==$col1[0]){
        $col1[1]=$pri;
        $col1[2]=$kant;
        $modif=$nom.":".$pri.":".$kant.":";

    }
   else{ 
    $modif=$ligne;
  }
   $recup.=$modif;
 }
 fclose($update);
 $modifier=fopen("test1.txt","w+" );
 fwrite($modifier,$recup);
 fclose($modifier);

$malist=fopen("test1.txt","r" );
echo'<table border=1px solid width=100% height=80% class="tab">';
 echo '<tr>
  <th scope="col">nom</th>
  <th scope="col">prix unitaire</th>
  <th scope="col">Quantite </th>
  <th scope="col">montant total </th>
</tr>';
while (!feof($malist)) {
$ligne=fgets($malist);
$col=explode(":",$ligne);
$col[3]=$col[1]*$col[2];
//echo '<tr>';
//for ($i=0; $i < count($col); $i++) { 
  if($col[2]<10){
    echo "<tr style='color:red'><td>$col[0]</td><td>$col[1]</td><td>$col[2]</td><td>$col[3]</td></tr>";
   }
   else {
    echo "<tr><td>$col[0]</td><td>$col[1]</td><td>$col[2]</td><td>$col[3]</td></tr>";
   }
  }

  echo '</table>';
  fclose($malist);


  
//}
/*if($col[2]<10){
   echo "<tr style='color:red'>";
  }
else { 
  echo "<tr>";
}*/
/*for($i=0;$i<count($col);$i++)
{
  echo "<td>".$col[$i]."</td>";
}*/
 //echo '</tr>';


?>



	
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

 </body>
</html> 

