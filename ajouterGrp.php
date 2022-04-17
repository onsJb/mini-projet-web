<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
$niveau=$_REQUEST['niveau'];
$groupe=$_REQUEST['groupe'];
$id_grp="INFO".$niveau."-".$groupe;

include("connexion.php");
         $sel=$pdo->prepare("select id from classe where id=? limit 1");
         $sel->execute(array($id_grp));
         $tab=$sel->fetchAll();
         if(count($tab)>0)
            $erreur="NOT OK";// Groupe existe déja
         else{
            $req="insert into classe values ('$id_grp','$niveau','$groupe')";
            $reponse = $pdo->exec($req) or die("error");
            $erreur ="OK";
         }  
         echo $erreur;
}
?>