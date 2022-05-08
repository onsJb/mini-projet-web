<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCO-ENICAR Supprimer Etudiant</title>
    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY -->
<script src="./assets/dist/js/jquery.min.js"></script>
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="./assets/dist/css/jumbotron.css" rel="stylesheet">

</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="index.php">SCO-Enicar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
        
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Groupes</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="afficherEtudiants.php">Lister tous les étudiants</a>
                <a class="dropdown-item" href="afficherEtudiantsParClasse.php">Etudiants par Groupe</a>
                <a class="dropdown-item" href="ajouterGroupe.php">Ajouter Groupe</a>
                <a class="dropdown-item" href="modifierGroupe.php">Modifier Groupe</a>
                <a class="dropdown-item" href="supprimerGroupe.php">Supprimer Groupe</a>
      
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Etudiants</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="ajouterEtudiant.php">Ajouter Etudiant</a>
                <a class="dropdown-item" href="chercherEtudiant.php">Chercher Etudiant</a>
                <a class="dropdown-item" href="modifierEtudiant.php">Modifier Etudiant</a>
                <a class="dropdown-item" href="supprimerEtudiant.php">Supprimer Etudiant</a>
      
      
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Absences</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="saisirAbsence.php">Saisir Absence</a>
                <a class="dropdown-item" href="etatAbsence.php">État des absences pour un groupe</a>
              </div>
            </li>
      
            <li class="nav-item active">
              <a class="nav-link" href="deconnexion.php">Se Déconnecter <span class="sr-only">(current)</span></a>
            </li>
      
          </ul>
        </div>
      </nav>
      
<main role="main">
        <div class="jumbotron">
            <div class="container">
              <h1 class="display-4">Supprimer un étudiant</h1>
              <p>Saisir le numéro de CIN de l'étudiant!</p>
            </div>
          </div>


<div class="container">
 <form id="myform" method="POST">
     
    <!--Groupe-->
    <div class="form-group">
     <label for="classe">CIN:</label><br>
     <input type="text" id="cin" name="cin" class="form-control" required>
    </div>

 </form> 
 <!--Bouton Ajouter-->
 <button  type="submit" class="btn btn-primary btn-block" onclick="supprimer()">Supprimer</button>
 <br>
</div> 
<div id="demo" class="alert"></div> 
</main>


<footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>
  <script>
function supprimer(){
  document.getElementById("demo").style.backgroundColor="white";
		var xmlhttp = new XMLHttpRequest();
    var url="supprimerEtud.php";
		
		//Envoie Req
    xmlhttp.open("POST",url,true);
		form=document.getElementById("myform");
    formdata=new FormData(form);
		xmlhttp.send(formdata);
		
		//Traiter Res
		xmlhttp.onreadystatechange=function(){
			
			if(this.readyState==4 && this.status==200){
                    //alert(this.responseText);
                    myFunction(this.responseText);
                }
			
		}

    xmlhttp.onreadystatechange=function(){
			
			if(this.readyState==4 && this.status==200){
                    //alert(this.responseText);
                    if(this.responseText=="OK")
                    {
                        document.getElementById("demo").innerHTML="La suppression de l'etudiant a été bien effectuée";
                        document.getElementById("demo").style.backgroundColor="#B0F2B6";
                    }
                    else
                    {
                        document.getElementById("demo").innerHTML="L'etudiant n'existe pas!";
                        document.getElementById("demo").style.backgroundColor="#F79B7D";
                    }
                }
			
		}
}
	</script>
<!-- <script  src="./assets/dist/js/inscrire.js"></script> -->
</body>
</html>