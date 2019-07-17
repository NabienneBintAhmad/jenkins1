<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Ajouter roduit</title>
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

  </div>
</nav>

	</header>

  </div>
    <form class="form-inline my-2 my-lg-0" method="post" action="">
    <p> Saisissez la quantité</p>
      <input name="Quantite"  class="form-control mr-sm-2" type="number" placeholder="seaech" aria-label="number" >
      <p>Saisissez un prix_min</p>
      <input name="min"  class="form-control mr-sm-2" type="number" placeholder="search" aria-label="number" >
      <p>Saisissez un prix_max</p>
      <input name="max"  class="form-control mr-sm-2" type="number" placeholder="search" aria-label="number" >
      <button class="btn btn-outline-success my-2 my-sm-0" name="submit" type="submit">Search</button>
    </form>
    </div>
    
                <?php 
$min=$_POST["min"];
$max=$_POST["max"];
$Quantite=$_POST["Quantite"]; 


if (isset($_POST['submit']))
     {
        $search = fopen("produits.txt", "r");
echo '<table border=1px solid width=60% weith=60%  class="tab" >
<thead >
  <tr>
    <th scope="col">nom</th>
    <th scope="col">prix unitaire</th>
    <th scope="col">Quantite  </th>
    <th scope="col">montant    </th>
  </tr>
</thead>
<tbody>';

while (!feof($search)) {
  $ligne=fgets($search);
  $col=explode(",", $ligne);
  $col[3]=$col[2]*$col[1];
        if ($Quantite<=$col[2] && $Quantite!="" && $min ==""   && $max =="" && $Quantite>0) {
          if($col[2]<10)    { echo "<tr style='color:red'>  <td>$col[0]</td><td>$col[1]</td><td>$col[2]</td><td>$col[3]</td> </tr>  ";   }
      else { echo "<tr> <td>$col[0]</td><td>$col[1]</td><td>$col[2]</td><td>$col[3]</td> </tr> </tr>"; }

}
        
            if ($min<=$col[1] && $min!="" && $max ==""  && $Quantite=="" ) {
              if($col[2]<10)    { echo "<tr style='color:red'>  <td>$col[0]</td><td>$col[1]</td><td>$col[2]</td><td>$col[3]</td> </tr>  ";   }
              else { echo "<tr> <td>$col[0]</td><td>$col[1]</td><td>$col[2]</td><td>$col[3]</td> </tr> </tr>"; }
              
              
        }
        if ($max>=$col[1] && $max!="" && $min ==""  && $Quantite=="" ) {
          if($col[2]<10)    { echo "<tr style='color:red'>  <td>$col[0]</td><td>$col[1]</td><td>$col[2]</td><td>$col[3]</td> </tr>  ";   }
          else    { echo "<tr> <td>$col[0]</td><td>$col[1]</td><td>$col[2]</td><td>$col[3]</td> </tr> </tr>"; }
          
          }
    }

    
    if($Quantite<=$col[2] && $Quantite!="" && $max>=$col[1] && $max!="" && $min<=$col[1] && $min!="" && $max>$min && $Quantite>0 ){
      if($col[2]<10)    { echo "<tr style='color:red'>  <td>$col[0]</td><td>$col[1]</td><td>$col[2]</td><td>$col[3]</td> </tr>  ";   }
else    { echo "<tr> <td>$col[0]</td><td>$col[1]</td><td>$col[2]</td><td>$col[3]</td> </tr> </tr>"; }


      
    }
    
  
    echo "</tbody></table>";
    fclose($search);
    
}
?> 

<?php 


echo "\n";
echo "----------------------------------------------------------";


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
