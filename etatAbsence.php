<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCO-ENICAR Etat Absence</title>
    <!-- Bootstrap core CSS -->
<link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JS-JQUERY -->
<script src="./assets/dist/js/jquery.min.js"></script>
<script src="./assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="./assets/dist/js/liste_classe.js"></script>

    <!-- Custom styles for this template -->
    <link href="./assets/dist/css/jumbotron.css" rel="stylesheet">

</head>
<body onload="liste_classe()">
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
              <a class="nav-link dropdown-toggle" href="index.html" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Groupes</a>              <div class="dropdown-menu" aria-labelledby="dropdown01">
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
              <h1 class="display-4">État des absences pour un groupe</h1>
              <p>Pour afficher l'état des absences, choisissez d'abord le groupe  et la periode concernée!</p>
            </div>
          </div>

<div class="container">
<form id="myform" method="POST">
<div class="form-group">
  <label for="debut">Date de début (j/m/a) : </label>
  <input type="date" id="debut" name="debut" size="10" value="01/09/2021" class="datepicker" required/>
</div>

<div class="form-group">
  <label for="fin">Date de fin (j/m/a) : </label>    
  <input type="date" id="fin" name="fin" size="10" value="12/03/2022" class="datepicker" required/>
</div>

<div class="form-group">
  <label for="classe">Choisir une classe:</label><br>
  <div id="liste"></div>
</div>
</form>
<!--Bouton Afficher-->
<button  type="submit" class="btn btn-primary btn-block" onclick="afficher()">Afficher</button>
<div id="etudiant"></div>

</div>  
</main>

<script>
    function afficher(){
    var xmlhttp = new XMLHttpRequest();
        var url = "etatAbs.php";
    //Envoie de la requete
	xmlhttp.open("POST",url,true);
	form=document.getElementById("myform");
  formdata=new FormData(form);
	xmlhttp.send(formdata);
     //Traiter la reponse
     xmlhttp.onreadystatechange=function()
            {  // alert(this.readyState+" "+this.status);
                if(this.readyState==4 && this.status==200){
                    myFunction(this.responseText);
                    //console.log(this.responseText);
                    //console.log(this.responseText);
                }
            }
    //Parse la reponse JSON
	function myFunction(response){
    //alert(response);
		var obj=JSON.parse(response);
        //alert(obj.success);
        if (obj.success==1)
        {
		var arr=obj.etudiants;
		var i;
		var out='<div class="table-responsive"><table class="table table-striped table-hover"><thead><tr class="gt_firstrow " ><th >Nom</th><th>Justifiées</th><th >Non justifiées</th><th >Total</th></tr></thead><tbody>';
		for ( i = 0; i < arr.length; i++) {
			out+='<tr><td><b>'+
			arr[i].nom +' '+ arr[i].prenom+
			'</b></td><td>'+arr[i].absJustif+'</td><td>'+arr[i].absNonJustif+'</td><td>'+(arr[i].absJustif+arr[i].absNonJustif)+'</td></tr>' ;
		}
    out+="</table>";
		  }
       else 
       out="Aucune Inscriptions!";
       document.getElementById("etudiant").innerHTML=out;
    }
  }

</script>

<footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>
</body>
</html>