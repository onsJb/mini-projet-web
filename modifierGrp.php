<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
$classe=$_REQUEST['classe'];
$niveau=$_REQUEST['niveau'];
$groupe=substr($classe, -1);
$id_grp="INFO".$niveau."-".$groupe;

include("connexion.php");
         $sel=$pdo->prepare("select id from classe where id=? limit 1");
         $sel->execute(array($classe));
         $tab=$sel->fetchAll();
         if(count($tab)>0)
         {
            $req="update classe set id='$id_grp',niveau='$niveau' where id='$classe'";
            $reponse = $pdo->exec($req) or die("error");
            $erreur ="OK";
         }
         else{
            $erreur="NOT OK";// Groupe n'existe pas
         }  
         echo $erreur;
}
?>