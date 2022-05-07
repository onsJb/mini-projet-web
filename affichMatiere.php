<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
$classe=$_REQUEST['classe'];
$niveau=substr($classe,4,1);
include("connexion.php");
$req="select * from matiere where niveau='$niveau'";
$reponse = $pdo->query($req);
if($reponse->rowCount()>0) {
	$outputs["matieres"]=array();
while ($row = $reponse ->fetch(PDO::FETCH_ASSOC)) {
        $matiere = array();
        $matiere["nom"] = $row["nom"];
         array_push($outputs["matieres"], $matiere);
    }
    // success
    $outputs["success"] = 1;
     echo json_encode($outputs);
} else {
    $outputs["success"] = 0;
    $outputs["message"] = "Pas de matieres!";
    // echo no users JSON
    echo json_encode($outputs);
}
}
