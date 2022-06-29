<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
require_once('components/db.php');
$temp = file_get_contents('php://input');
$rqst = json_decode($temp, true);
$user = $_SESSION['username'];
if(!isset($_SESSION['username'])){
    exit(json_encode(array("error" => "Необходимо войти или зарегистрироваться")));
} elseif ($rqst["rqst"] == "cat") {
    $cattemp = $mysqli -> query("SELECT * FROM `mcc_codes` WHERE 1");
    for($catsend = []; $row = $cattemp->fetch_assoc(); $catsend[] = $row);
    exit (json_encode($catsend));
} elseif ($rqst["rqst"] == "shop") {
    $cattemp = $mysqli -> query("SELECT * FROM `mcc_search` WHERE 1");
    for($catsend = []; $row = $cattemp->fetch_assoc(); $catsend[] = $row);
    exit (json_encode($catsend)); 
} elseif ($rqst["rqst"] == "card"){
    $cardtemp = $mysqli -> query("SELECT * FROM `cards` WHERE `user` = '$user'");
    for($cardsend = []; $row = $cardtemp->fetch_assoc(); $cardsend[] = $row);
    exit (json_encode($cardsend)); 
} else exit(json_encode(array("error" => "Ошибка базы данных")));
?>