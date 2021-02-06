<?php 

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require("../../vendor/autoload.php");


$boardObject = unserialize($_SESSION["boardObject"]);
$idPawn = $_POST["idPawn"];
$list_IdBox = array();

foreach ($boardObject->getList_Player()[0]->getList_Pawn() as $index => $pawn) {
    if($pawn->getId() == $idPawn){
        foreach ($pawn->whereToMove() as $idBox) {
            array_push($list_IdBox, $idBox);
        }
    }
}

$response = ["list_idBox" => $list_IdBox];

echo json_encode($response);

?>