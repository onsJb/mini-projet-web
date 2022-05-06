<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {
include("connexion.php");
$req="select * from classe";
$reponse = $pdo->query($req);
if($reponse->rowCount()>0) {
	$outputs["classes"]=array();
while ($row = $reponse ->fetch(PDO::FETCH_ASSOC)) {
        $classe = array();
        $classe["id"] = $row["id"];
        $classe["niveau"] = $row["niveau"];
        $classe["groupe"] = $row["groupe"];
         array_push($outputs["classes"], $classe);
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
