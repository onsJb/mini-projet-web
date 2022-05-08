<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCO-ENICAR Saisir Absence</title>
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
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Gestion des Groupes</a>              <div class="dropdown-menu" aria-labelledby="dropdown01">
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
              <h1 class="display-4">Signaler l'absence pour tout un groupe</h1>
              <p>Pour signaler, annuler ou justifier une absence, choisissez d'abord le groupe, le module puis l'étudiant concerné!</p>
            </div>
          </div>
<div class="container">
<div id="demo" class="alert"></div>
<form id="myform" method="POST" >

<div class="form-group">
  <label for="classe">Choisir un groupe:</label><br>
  <div id="liste" onchange="liste_etudiant()"></div>
</div>

<div class="form-group">
  <label for="semaine">Choisir une semaine:</label><br>
  <input id="semaine" type="week" name="debut" size="10" class="datepicker" onchange="setSemaine()"/>
</div>

<div class="form-group" id="matiere"></div>

<br>
<div id="etudiant"></div>

</form>
</div>  
</main>

<script>
function valider(){
  var cin=document.getElementById("cin").innerHTML;
  var matiere=document.getElementById("myform").matiere.value;
  var dates= [];

  if(document.getElementById("d1").checked == true )
    dates.push(document.getElementById("day1").innerHTML);

  if(document.getElementById("d2").checked == true )
    dates.push(document.getElementById("day2").innerHTML);

  if(document.getElementById("d3").checked == true )
    dates.push(document.getElementById("day3").innerHTML);

  if(document.getElementById("d4").checked == true )
    dates.push(document.getElementById("day4").innerHTML);

  if(document.getElementById("d5").checked == true )
    dates.push(document.getElementById("day5").innerHTML);

  if(document.getElementById("d6").checked == true )
    dates.push(document.getElementById("day6").innerHTML);

    //alert(dates);
  var data = new FormData();
  data.append('cin', cin);
  data.append('matiere', matiere);
  data.append('dates',JSON.stringify(dates));

  var xmlhttp = new XMLHttpRequest();
  var url = "saisirAbs.php";
	xmlhttp.open("POST",url,true);
  xmlhttp.send(data);

  xmlhttp.onreadystatechange=function(){
			
			if(this.readyState==4 && this.status==200){
                    //alert(this.responseText);
                    if(this.responseText=="OK")
                    {
                        document.getElementById("demo").innerHTML="Absence validée";
                        document.getElementById("demo").style.backgroundColor="#B0F2B6";
                    }
                    else
                    {
                        document.getElementById("demo").innerHTML="Absence non validée";
                        document.getElementById("demo").style.backgroundColor="#F79B7D";
                    }
                }
			
		}
}

function dayToDate(year, day) {
  const date = new Date(year, 0, day);
  return date;
}
function setSemaine(){
  var w,y,d;

  w=parseInt(document.getElementById("myform").debut.value.substr(-2));
  y=parseInt(document.getElementById("myform").debut.value.substr(0,4));

  d1=dayToDate(y,w*7-4);
  d2=dayToDate(y,w*7-3);
  d3=dayToDate(y,w*7-2);
  d4=dayToDate(y,w*7-1);
  d5=dayToDate(y,w*7);
  d6=dayToDate(y,w*7+1);

  document.getElementById("day1").innerHTML=d1.getDate()+"/"+(d1.getMonth()+1)+"/"+d1.getFullYear();
  document.getElementById("day2").innerHTML=d2.getDate()+"/"+(d2.getMonth()+1)+"/"+d2.getFullYear();
  document.getElementById("day3").innerHTML=d3.getDate()+"/"+(d3.getMonth()+1)+"/"+d3.getFullYear();
  document.getElementById("day4").innerHTML=d4.getDate()+"/"+(d4.getMonth()+1)+"/"+d4.getFullYear();
  document.getElementById("day5").innerHTML=d5.getDate()+"/"+(d5.getMonth()+1)+"/"+d5.getFullYear();
  document.getElementById("day6").innerHTML=d6.getDate()+"/"+(d6.getMonth()+1)+"/"+d6.getFullYear();
  }
  function liste_etudiant(){
    liste_matiere();
    var xmlhttp = new XMLHttpRequest();
        var url = "afficherEtudParGrp.php";
    //Envoie de la requete
	xmlhttp.open("POST",url,true);
	form=document.getElementById("myform");
  formdata=new FormData(form);
	xmlhttp.send(formdata);
     //Traiter la reponse
     xmlhttp.onreadystatechange=function()
            {  //alert(this.readyState+" "+this.status);
                if(this.readyState==4 && this.status==200){
                    myFunction(this.responseText);
                    //console.log(this.responseText);
                    //console.log(this.responseText);
                }
            }
    //Parse la reponse JSON
	function myFunction(response){
		var obj=JSON.parse(response);
        //alert(obj.success);
        if (obj.success==1)
        {
		var arr=obj.etudiants;
		var i;
		var out='<table class="table table-striped table-hover"><th width="200px"></th><th width="100px" style="padding-left: 5px; padding-right: 5px;">Lundi<br><label for="d1"><div id="day1"></div></label></th><th width="100px" style="padding-left: 5px; padding-right: 5px;">Mardi<br><label for="d"><div id="day2"></div></label></th><th width="100px" style="padding-left: 5px; padding-right: 5px;">Mercredi<br><label for="d3"><div id="day3"></div></label></th><th width="100px" style="padding-left: 5px; padding-right: 5px;">Jeudi<br><label for="d4"><div id="day4"></div></label></th><th width="100px" style="padding-left: 5px; padding-right: 5px;">Vendredi<br><label for="d5"><div id="day5"></div></label></th><th width="100px" style="padding-left: 5px; padding-right: 5px;">Samedi<br><label for="d6"><div id="day6"></div></label></th><th width="100px"></th></tr>';
		for ( i = 0; i < arr.length; i++) {
			out+='<tr class="row_3"><td id="etud"><div id="cin">'+arr[i].cin+'</div> '+'<b>'+
			arr[i].nom +' '+ arr[i].prenom+
			'</b></td><td><input type="checkbox" id="d1" name="d1"></td><td><input type="checkbox" id="d2" name="d2""></td><td><input type="checkbox" id="d3" name="d3"></td><td><input type="checkbox" id="d4" name="d4"></td><td><input type="checkbox" id="d5" name="d5"></td><td><input type="checkbox" id="d6" name="d6"></td><td><button  type="button" class="btn btn-primary btn-block" onclick="valider()">Valider</button></td></tr>' ;
		}
    out+="</table>";
		  }
       else 
       out="Aucune Inscriptions!";
       
       document.getElementById("etudiant").innerHTML=out;
    }
  }

  function liste_matiere(){
    var xmlhttp = new XMLHttpRequest();
        var url = "affichMatiere.php";
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
                    //alert(this.responseText);
                    //console.log(this.responseText);
                }
            }
    //Parse la reponse JSON
	function myFunction(response){
    //console.log(response);
		var obj=JSON.parse(response);
        //alert(obj.success);
        if (obj.success==1)
        {
		var arr=obj.matieres;
		var i;
		var out='<label for="matiere">Choisir un module:</label><br><select id="matiere" name="matiere" class="custom-select custom-select-sm custom-select-lg"><option value="">--</option>';
		for ( i = 0; i < arr.length; i++) {
			out+='<option value="'+arr[i].nom+'">'+arr[i].nom+'</option>';
		}
		out +="</select>";
		document.getElementById("matiere").innerHTML=out;
       }
       else document.getElementById("matiere").innerHTML="Pas de matiere!";
    }
  }
</script>
<footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>
</body>
</html>