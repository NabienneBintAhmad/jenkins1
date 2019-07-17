<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Ajouter user</title>
</head>
<body>


<center>
<div class="container-fluid">
<div class="jumbotron">
  <h1>Ajouter des utilisateurs</h1>
</div>
</div>
</center>

<center>
<form class="needs-validation" novalidate method="post" action="">
<table>
<div class="form-row">
<div class="col-md-4 mb-3">
		<tr>
		<td> <em>Nom</em></td>
         <td> <input type="texte" name="nom" placeholder="nom" required></td>
		</tr>
    <div class="col-md-4 mb-3">
    <td><em>Identifiant</em> </td>
	<td><input type="texte" name="id"  placeholder="identifiant" required>
		</tr>
    </div>
    <div class="col-md-4 mb-3">
    <tr>
<td><em>Mot de passe</em> </td>
<td><input type="password" name="mdp" placeholder="password" required></td>
		</tr>
 
    </div>
    <div class="col-md-4 mb-3">
    <tr>
	<td><em>Telephone</em></td>
	<td><input type="texte" name="tel" placeholder="Tel" required ></td>
		</tr>
  
    </div>
    <div class="col-md-4 mb-3">
  	<tr>
	<td><em>Mail</em>  </td>
	<td><input type="text" name="mail" placeholder="e-mail" required></td>
	</tr>

    </div>
  <div class="col-md-4 mb-3">
		<tr>
		<td> <em>adresse</em></td>
		<td><input type="texte" name="adresse" placeholder="adress" required></td>
	</tr>
  
    </div>
  <div class="col-md-4 mb-3">
  <tr>
		<td> <em>Profil</em></td>
		<td><input type="texte" name="user" placeholder="profil user" required></td>
	</tr>

    </div>
    <div class="col-md-4 mb-3">
		<tr>
		<td> <em>Statut</em></td>
		<td><input type="texte" name="statut" placeholder="statut" required></td>
	</tr>

    </div>
		
<div>
<tr>
<td>
<button class="btn btn-primary" type="submit" name="submi" >Submit form</button>
</td>
</tr>
</div>
</div>

	</table>
  </form>
</center>


<center>

<div>
<?php
if(isset($_POST['submi']))
{
$users=fopen('users.txt','a+');
$nom=$_POST['nom'];
$id=$_POST['id'];
$mdp=$_POST['mdp'];
$tel=$_POST['tel'];
$mail=$_POST['mail'];
$adresse=$_POST['adresse'];
$user=$_POST['user'];
$statut=$_POST['statut'];
$trouve=false;
while ($ligne=fgets($users))
 {
  
$col=explode(",",$ligne);
if($id==$col[1] && $mdp==$col[2]  && $mail==$col[4] && $tel==$col[3])
{
  $trouve=true;
  echo "Ces parametres existent deja !!!!!!!"; 
}

}
if($trouve==false)
{
  fwrite($users,"\n".$nom.",".$id.",".$mdp.",".$tel.",".$mail.",".$addresse.",".$user.",".$statut.",\n");
}
fclose($users);


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
}

?>
</div>
</center>












<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
