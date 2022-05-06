<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
$cin=$_REQUEST['cin'];

include("connexion.php");
         $sel=$pdo->prepare("select cin from etudiant where cin=? limit 1");
         $sel->execute(array($cin));
         $tab=$sel->fetchAll();
         if(count($tab)>0)
         {
            $req="delete from etudiant where cin='$cin'";
            $reponse = $pdo->exec($req) or die("error");
            $erreur ="OK";
         }
         else{
            $erreur="NOT OK";// Etudiant n'existe pas
         }  
         echo $erreur;
}
?>