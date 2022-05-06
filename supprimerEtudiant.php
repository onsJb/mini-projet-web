<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCO-ENICAR Afficher Etudiants</title>
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
              <h1 class="display-4">Liste des étudiants</h1>
              <p>Choisir l'étudiant à supprimer!</p>
            </div>
          </div>
          <div class="container">

          <form id="myform" method="GET" action="ajouterGroupe.php">
            <!--Niveau-->
            <div class="form-group">
            <label for="niveau">Niveau:</label><br>
            <div class="form-check-inline">
            <input type="radio" name="niveau" id="1ere" value="1" class="form-check-input" checked>
            <label for="1ere" class="form-check-label">1ère année</label>
            </div>
            <div class="form-check-inline">
            <input type="radio" name="niveau" id="2eme" value="2" class="form-check-input">
            <label for="2eme" class="form-check-label">2ème année</label>
           </div>
           <div class="form-check-inline">
            <input type="radio" name="niveau" id="3eme" value="3" class="form-check-input">
            <label for="3eme" class="form-check-label">3ème année</label>
           </div>
           </div>
            <!--Groupe-->
            <div class="form-group">
            <label for="groupe">Groupe:</label><br>
            <input type="text" id="groupe" name="groupe" class="form-control" required>
           </div>
           <!--Button Afficher-->
           <button  type="button" class="btn btn-primary btn-block active">Afficher</button>
           <br>
          </form>

<div class="row">
<div class="table-responsive"> 
 <table class="table table-striped table-hover">
   <h2>1-INFO D</h2>
     <!--Ligne Entete-->
     <tr>
         <th>
             CIN
         </th>
         <th>
             Nom
         </th>
         <th>
             Prénom
         </th>
         <th>
             Email
         </th>
         <th>
             Classe
         </th>
         <th>

         </th>
     </tr>
     <!--1er Etudiant-->
     <tr>
         <td>
             1111
         </td>
         <td>
             N1
         </td>
         <td>
             P1
         </td>
         <td>
             n1.p1@gmail.com
         </td>
         <td>
             INFO1D
         </td>
         <td>
          <button  type="button" class="btn btn-danger active">Supprimer</button>
        </td>
     </tr>
     <!--2eme Etudiant-->
     <tr>
        <td>
            2222
        </td>
        <td>
            N2
        </td>
        <td>
            P2
        </td>
        <td>
            n2.p2@gmail.com
        </td>
        <td>
            INFO1E
        </td>
        <td>
          <button  type="button" class="btn btn-danger active">Supprimer</button>
        </td>
    </tr>
 </table>
 <br>
 </div>
</div>
</div>

</main>


<footer class="container">
    <p>&copy; ENICAR 2021-2022</p>
  </footer>
</body>
</html>