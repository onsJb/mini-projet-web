<?php
	//on récupere les variables
	session_start();
	@$login=$_POST["login"];
	@$pass=md5($_POST["pass"]);
	@$valider=$_POST["valider"];
	$erreur="";
	//on test si valier est nulle ou pas
	if(isset($valider)){
		include("connexion.php");
		$sel=$pdo->prepare("select * from enseignant where login=? and pass=? limit 1");
		$sel->execute(array($login,$pass));
		//on récupére res de la requette ds tab
		$tab=$sel->fetchAll();
		 if(count($tab)>0) {  //user existe
			//on ouvre une session a cet user
			$_SESSION["prenomNom"]=ucfirst(strtolower($tab[0]["prenom"]))." ".strtoupper($tab[0]["nom"]);
			/*$_SESSION["prenomNom"]=ucfirst(strtolower($tab[0]["prenom"])).
         " ".strtoupper($tab[0]["nom"]);*/
			$_SESSION["autoriser"]="oui"; //autoriser l'acces
			header("location:index.php"); //aller a la page index.php
		 }
		 else
			$erreur=" Login ou mot de passe invalide! Veuillez vérifier vos données";
		
		
	
	}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>SCO-ENICAR Se Connecter</title>

    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="./assets/dist/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">

<!--div id="erreur"></div-->
<form id="myForm" class="form-signin" action="" method="post">
  <img class="mb-4" src="./assets/brand/user-login.svg" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Veuillez vous connecter</h1>
  <label for="inputEmail" class="sr-only">Email </label>
  <input  type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus name="login">
  <label for="inputPassword" class="sr-only">Mot de Passe</label>
  <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="pass">

  <button class="btn btn-lg btn-primary btn-block"  type="submit" name="valider">Se Connecter</button>
  <br>
  <div class="erreur"><?php echo $erreur ?></div>
  <br><a href="inscription.php"> Créer un Compte</a>
  <p class="mt-5 mb-3 text-muted">&copy; SOC-Enicar 2021-2022</p>
</form>
</script>
  </body>
</html>
