<?php
session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
 else {
include("connexion.php");
$req="SELECT * FROM classe";
$reponse = $pdo->query($req);
if($reponse->rowCount()>0) {
	$outputs["etudiants"]=array();
while ($row = $reponse ->fetch(PDO::FETCH_ASSOC)) {
        $etudiant = array();
		$etudiant["id"] = $row["id"];
        $etudiant["niveau"] = $row["niveau"];
        $etudiant["groupe"] = $row["goupe"];
         array_push($outputs["etudiants"], $etudiant);
    }
    // success
    $outputs["success"] = 1;
     echo json_encode($outputs);
} else {
    $outputs["success"] = 0;
    $outputs["message"] = "Pas d'étudiants";
    // echo no users JSON
    echo json_encode($outputs);
}
}
 











?>