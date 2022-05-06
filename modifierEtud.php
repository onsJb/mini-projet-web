<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
$cin=$_REQUEST['cin'];
$nom=$_REQUEST['nom'];
$prenom=$_REQUEST['prenom'];
$email=$_REQUEST['email'];
$adresse=$_REQUEST['adresse'];
$classe=$_REQUEST['classe'];

include("connexion.php");
$req="update etudiant set nom='$nom', prenom='$prenom', email='$email', adresse='$adresse', Classe='$classe' where cin='$cin'";
$reponse = $pdo->exec($req) or die("error");
$erreur ="OK";
echo $erreur;
}
?>