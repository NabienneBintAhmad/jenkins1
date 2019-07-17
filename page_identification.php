<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="login.css">
    <title>Identificatio</title>
</head>
<body>
<body class="align">

  <div class="grid">

    <form action="" method="post" class="form login">

      <header class="login__header">
        <h3 class="login__title">Login</h3>
      </header>

      <div class="login__body">

        <div class="form__field">
          <input type="email" placeholder="Email" name="email" required>
        </div>

        <div class="form__field">
          <input type="password" placeholder="Password"  name="mdp" required>
        </div>

      </div>

      <footer class="login__footer">
        <input type="submit" value="connexion"  name="connexion">

        <p><span class="icon icon--info">?</span><a href="#">Forgot Password</a></p>
      </footer>

    </form>

  </div>

</body>

<?php
$email=$_POST['email'];
    $mdp=$_POST['mdp'];
    $connex=fopen("users.txt","r");
    if (isset($_POST['connexion'])) {
        while (!feof($connex)) {
            $ligne=fgets($connex);
            $col=explode(",",$ligne);
            if($email==$col[4] && $mdp==$col[2] && $col[6]=="admin" && $col[7]!="debloquer"){
                header('location:profiladmin.php');
            }
            else{ echo"Vous etes bloqué!";}
            if($email==$col[4] && $mdp==$col[2] && $col[6]=="user" && $col[7]!="debloquer"){
            header('location:accueil.php');
            }
            else{ echo"Vous etes bloqué!";}
        }
        // echo " Identifiant ou mot de passe incorrecte";
		}
    fclose($connex);
    ?>





</body>
</html>
