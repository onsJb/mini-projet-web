<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCO-ENICAR Ajouter Etudiant</title>
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
        <a class="navbar-brand" href="index.html">SCO-Enicar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
            </li>
        
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="index.html" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Groupes</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="afficherEtudiants.html">Lister tous les étudiants</a>
                <a class="dropdown-item" href="afficherEtudiantsParClasse.html">Etudiants par Groupe</a>
                <a class="dropdown-item" href="ajouterGroupe.html">Ajouter Groupe</a>
                <a class="dropdown-item" href="modifierGroupe.html">Modifier Groupe</a>
                <a class="dropdown-item" href="supprimerGroupe.html">Supprimer Groupe</a>
      
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Etudiants</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="ajouterEtudiant.html">Ajouter Etudiant</a>
                <a class="dropdown-item" href="chercherEtudiant.html">Chercher Etudiant</a>
                <a class="dropdown-item" href="modifierEtudiant.html">Modifier Etudiant</a>
                <a class="dropdown-item" href="supprimerEtudiant.html">Supprimer Etudiant</a>
      
      
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Absences</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="saisirAbsence.html">Saisir Absence</a>
                <a class="dropdown-item" href="etatAbsence.html">État des absences pour un groupe</a>
              </div>
            </li>
      
            <li class="nav-item active">
              <a class="nav-link" href="login.html">Se Déconnecter <span class="sr-only">(current)</span></a>
            </li>
      
          </ul>
        
      
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Saisir un groupe" aria-label="Chercher un groupe">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Chercher Groupe</button>
          </form>
        </div>
      </nav>
      
<main role="main">
        <div class="jumbotron">
            <div class="container">
              <h1 class="display-4">Chercher un étudiant</h1>
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
 <button  type="submit" class="btn btn-primary btn-block" onclick="chercher()">Chercher</button>
</div> 
<div id="demo" class="alert"></div> 
</main>


<footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>
  <script>
function chercher(){
		
		var xmlhttp = new XMLHttpRequest();
    var url="chercherEtud.php";
		
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

    function myFunction(response){
		var obj=JSON.parse(response);
        //alert(obj.success);

        if (obj.success==1)
        {
		var arr=obj.etudiants;
		var i;
		var out='<table class="table table-striped table-hover"><tr> <th>CIN</th><th>Nom</th><th>Prénom</th><th>Email</th><th>Adresse</th><th>Classe</th></tr>';
		for ( i = 0; i < arr.length; i++) {
			out+="<tr><td>"+
			arr[i].cin +
			"</td><td>"+
			arr[i].nom+
			"</td><td>"+
			arr[i].prenom+
			"</td><td>"+
			arr[i].email+
			"</td><td>"+
			arr[i].adresse+
			"</td><td>"+
			arr[i].classe+
			"</td></tr>" ;
		}
		out +="</table>";
		document.getElementById("demo").innerHTML=out;
       }
       else {
         document.getElementById("demo").innerHTML="Etudiant introuvable!";
         document.getElementById("demo").style.backgroundColor="#fba";
       }

    }
}
	</script>
<!-- <script  src="./assets/dist/js/inscrire.js"></script> -->
</body>
</html>