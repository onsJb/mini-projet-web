<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
$cin=$_REQUEST['cin'];
$matiere=$_REQUEST['matiere'];
$dates = json_decode($_REQUEST['dates']);
include("connexion.php");
for($i = 0; $i <= sizeof($dates)-1; $i++)
{ $dat=$dates[$i];
//$sel=$pdo->prepare("select cin from absence where cin='$cin' and matiere='$matiere' and date=STR_TO_DATE('$dat', '%d/%m/%Y') limit 1");
//$sel->execute(array($cin));
//$tab=$sel->fetchAll();
//if(count($tab)>0)
//$erreur="NOT OK";// Absence existe déja
//else{
    $req="insert into absence values ('$cin',STR_TO_DATE('$dat', '%d/%m/%Y'),'$matiere')";
    $reponse = $pdo->exec($req) or die("error");
    $erreur ="OK";
    }  
    echo $erreur;
}
//}