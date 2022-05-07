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
              <h1 class="display-4">Signaler l'absence pour tout un groupe</h1>
              <p>Pour signaler, annuler ou justifier une absence, choisissez d'abord le groupe, le module puis l'étudiant concerné!</p>
            </div>
          </div>

<div class="container">
<form id="myform" method="POST" >
<div class="form-group">
  <label for="semaine">Choisir une semaine:</label><br>
  <input id="semaine" type="week" name="debut" size="10" class="datepicker" onchange="myfunction()"/>
</div>
<div class="form-group">
  <label for="classe">Choisir un groupe:</label><br>
  <div id="liste"></div>
</div>

<div class="form-group">
  <label for="module">Choisir un module:</label><br>
  <select id="module" name="module"  class="custom-select custom-select-sm custom-select-lg">
      <option value="1-INFOA">Tech. Web</option>
      <option value="1-INFOB">SGBD</option>
  </select>
  </div>

<table rules="cols" frame="box">

<th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;">Lundi</th>
<th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;">Mardi</th>
<th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;">Mercredi</th>
<th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;">Jeudi</th>
<th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;">Vendredi</th>
<th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;">Samedi</th>
</tr><tr><td>&nbsp;</td>
<th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;" id="day1"></th>
<th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;" id="day2"></th>
<th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;" id="day3"></th>
<th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;" id="day4"></th>
<th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;" id="day5"></th>
<th colspan="2" width="100px" style="padding-left: 5px; padding-right: 5px;" id="day6"></th>
</tr><tr><td>&nbsp;</td>
<th>AM</th><th>PM</th><th>AM</th><th>PM</th><th>AM</th><th>PM</th><th>AM</th><th>PM</th><th>AM</th><th>PM</th><th>AM</th><th>PM</th>
</tr>
<tr class="row_3"><td><b>M. WALID SAAD</b></td>
<td><input type="checkbox"></td>
<td><input type="checkbox"></td>
<td><input type="checkbox"></td>
<td><input type="checkbox"></td>
<td><input type="checkbox"></td>
<td><input type="checkbox"></td>
<td><input type="checkbox"></td>
<td><input type="checkbox"></td>
<td><input type="checkbox"></td>
<td><input type="checkbox"></td>
<td><input type="checkbox"></td>
<td><input type="checkbox"></td>
</tr>

<tr class="row_3"><td><b>M. WALID SAAD</b></td>
  <td><input type="checkbox"></td>
  <td><input type="checkbox"></td>
  <td><input type="checkbox"></td>
  <td><input type="checkbox"></td>
  <td><input type="checkbox"></td>
  <td><input type="checkbox"></td>
  <td><input type="checkbox"></td>
  <td><input type="checkbox"></td>
  <td><input type="checkbox"></td>
  <td><input type="checkbox"></td>
  <td><input type="checkbox"></td>
  <td><input type="checkbox"></td>
  </tr>
</table>
<br>
</form>
 <!--Bouton Valider-->
 <button  type="submit" class="btn btn-primary btn-block" >Valider</button>
<br>
</div>  
</main>

<script>

function dayToDate(year, day) {
  const date = new Date(year, 0, day);

  return date;
}
function myfunction(){
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
</script>

<footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>
</body>
</html>