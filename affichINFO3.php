<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
include("connexion.php");
$req="select * from classe where niveau='3'";
$reponse = $pdo->query($req);
if($reponse->rowCount()>0) {
	$outputs["groupes"]=array();
while ($row = $reponse ->fetch(PDO::FETCH_ASSOC)) {
        $groupe = array();
        $groupe["nom"] = $row["id"];
         array_push($outputs["groupes"], $groupe);
    }
    // success
    $outputs["success"] = 1;
     echo json_encode($outputs);
} else {
    $outputs["success"] = 0;
    $outputs["message"] = "Pas de groupes!";
    // echo no users JSON
    echo json_encode($outputs);
}
}
