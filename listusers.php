<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  
    <title>Listes users</title>
</head>

<body>

<div class="col-3">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="page_identification.php">Page de connexion <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="listusers.php">Lister users</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Parametres </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="ajoutuser.php">Ajouter users</a>
          <a class="dropdown-item" href="blockuser.php">bloquer un user</a>
      </li>
    </ul>
   <div> 
</div>

<center>
<div class="container-fluid">

<div class="jumbotron">
  <h1>Listes des utilisateurs</h1>
</div>

<?php 
$listusers=fopen('users.txt','r');
echo'<table border=1px class="table table-dark" >';
 echo '<tr>
  <th scope="col">Nom</th>
  <th scope="col">Identifiant</th>
  <th scope="col">Mot de passe </th>
  <th scope="col"> Téléphone</th>
  <th scope="col">Mail </th>
  <th scope="col">dresse </th>
  <th scope="col"> Profile</th>
  <th scope="col"> Statut</th>
</tr>';

while (!feof($listusers)) {
$ligne=fgets($listusers);
$col=explode(",",$ligne);
echo '<tr>';
for($i=0;$i<count($col);$i++){
  echo "<td>".$col[$i]."</td>";
}
 echo '</tr>';

}
echo '</table>';
fclose($listusers);
?>
</div>
</center> 

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>
</html>