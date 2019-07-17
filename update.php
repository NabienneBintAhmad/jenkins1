
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
        <a class="nav-link" href="page_identification.php">Page de connexion <span class="sr-only">(current)</span></a>
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
    <form class="form-inline my-2 my-lg-0" method="POST" action="update.php">
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

?>

            
<?php
    // if(isset($_POST['update'])){
    $update=fopen('produits.txt','r' );
    $nom=$_POST['Produits'];
    $pri=$_POST['Prix'];
    $kant=$_POST['Quantité']; 
    while (!feof($update)) {
    $ligne=fgets($update);
    $col=explode(",",$ligne);
    if($nom==$col[0]){
        $col[1]=$pri;
        $col[2]=$kant;
        $modif=$nom.",".$pri.",".$kant.",".$col[3];

    }
   else{ 
    $modif=$ligne;
  }
   $recup=$recup.$modif;
 }
 fclose($update);
 $modifier=fopen('produits.txt','w+' );
 fwrite($modifier,$recup);
 fclose($modifier);
// }

$malist=fopen('produits.txt','r');
echo'<table border=2px solid width=80% heith=60% margin-left=10% margin-top=15px class="tab" style="background-color:Lime">';
 echo '<tr>
  <th scope="col">nom</th>
  <th scope="col">prix unitaire</th>
  <th scope="col">Quantite </th>
  <th scope="col">montant total </th>
</tr>';
while (!feof($malist)) {
$ligne=trim(fgets($malist));
$col=explode(",",$ligne);
$col[3]=$col[1]*$col[2];
echo '<tr>';
if($col[2]<10)  { echo "<tr style='background-color:red'>";}
else { echo "<tr>";}
for($i=0;$i<count($col);$i++){
  echo "<td>".$col[$i]."</td>";
}
 echo '</tr>';

}

echo '</table>';
fclose($malist);
?>




	
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

 </body>
</html> 

