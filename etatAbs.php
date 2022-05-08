<?php
 session_start();
 if($_SESSION["autoriser"]!="oui"){
	header("location:login.php");
	exit();
 }
else {

include("connexion.php");
$classe=$_REQUEST['classe'];
$debut=$_REQUEST['debut'];
$fin=$_REQUEST['fin'];
$req="select * from etudiant where classe='$classe'";
$reponse = $pdo->query($req);
if($reponse->rowCount()>0) {
	$outputs["etudiants"]=array();
while ($row = $reponse ->fetch(PDO::FETCH_ASSOC)) {
        $etudiant = array();
        $cin=$row["cin"];
        $etudiant["nom"] = $row["nom"];
        $etudiant["prenom"] = $row["prenom"];
        $reqq="select count(*) as nb from absence where cin='$cin' and date between '$debut' and '$fin'";
        $res = $pdo->query($reqq);
        while($row = $res ->fetch(PDO::FETCH_ASSOC)){

        if($res->rowCount()>0) {
            $etudiant["abs"]=$row["nb"];
        }
        else 
        $etudiant["abs"]=0;
        }
         array_push($outputs["etudiants"], $etudiant);
    }
    // success
    $outputs["success"] = 1;
     echo json_encode($outputs);
} else {
    $outputs["success"] = 0;
    $outputs["message"] = "Pas d'etudiants";
    // echo no users JSON
    echo json_encode($outputs);
}
}
?>