
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Mini Projet</title>
	<link rel="stylesheet" type="text/css" href="miniprojet1.css"></link>
</head>
<body>

	<center>
	<h1>
		<p><em> <marquee behavior="alternate" direction="right"> <h1> Bienvenue à l'interface utilisateur ! </h1></marquee> </em>  </p>
	</h1>
	<h2> <p> <strong>Veuillez entrer vos identifiants</strong> </p>  </h2> <br>
<form action="" method="POST">
	<table>

	    <tr>
			<td><p> <em> <strong>Login</strong> </em> </p> </td>
			<td> <div class="input-group mb-2"><input type="text" name="login" required="required" placeholder= "login"></div> </td>
		</tr>

		<tr>
			<td> <p> <em> <strong> Mot de passe</strong></em></p> </td>
			<td> <input type="password" name="mdp" required="required" placeholder="MDP">
    </td>
	 <td>	<p> entre 8-20 caractères .</p></td>
		</tr>
		<tr>
		<td>
		<input class="form-check-input" type="checkbox" id="inlineFormCheck">
    <label class="form-check-label" for="inlineFormCheck">
    </label>
		</td>
		<td><p>se souvenir de moi</p></td>
		</tr>
	  <tr>
		<td> <p><strong>Se connecter </strong>  </p> </td>
	    <td><input type="submit" name="envoyer"> </td>
	  </tr>
	
	</table>
</form>
</center>

 <?php
 if(isset($_POST['envoyer'])){
    $connex=fopen('users.txt','r' );
    while ($ligne=trim(fgets($connex))) {
		$login=$_POST['login'];
		$mdp=$_POST['mdp'];
    $col=explode(",",$ligne);
    for($i=0;$i<count($col);$i++){
    if($login==$col[1] && $mdp==$col[2]  && $col[6]=="admin"){
        header('location:profiladmin.php');
    }
	/*if($login==$col[1] && $mdp==col[2] && $col[6]=="user")
	 { header('location:accueil.php');}*/
 }
 
}
fclose($connex);
}
    ?>




<div id="footer">
 	 <footer>
 	
<p> &copy Tous droits réservés aux utilisateurs</p>
</footer>
</div>


 </body>
</html>
