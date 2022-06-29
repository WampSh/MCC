<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
require_once('components/db.php');

$cat = $_POST['cat'];
$shop = $_POST['shop'];
$mcc = $_POST["mcc"];
$card = $_POST["card"];
$user = $_SESSION['username'];

// ------------------------  Поиск по МСС  --------------------------------
if (strlen($mcc) == 4){
    $resultcard = $mysqli->query("SELECT * FROM `cards` WHERE `user` = '$user' AND `bonusmcc` = '$mcc'");
    if (!isset($resultcard)){
        echo "Подходящей карты не найдено";
    } else {
        for($result = []; $row = $resultcard->fetch_assoc(); $result[] = $row);
        exit(json_encode($result));
    }
}

// -------------------  Поиск по категории ---------------------------------
elseif(strlen($cat) >= 2){
    $resultcard = $mysqli->query("SELECT * FROM `cards` WHERE `user` = '$user' AND `cat` = '$cat'")->fetch_assoc();
    if (!$resultsearch){
        echo "Подходящей карты не найдено";
    } else echo "Поиск по КАТЕГОРИИ";
    // } else var_dump(json_encode($resultcard));
}

// ------------------- Поиск по магазину ----------------------------------
elseif (strlen($shop) >= 2){
    $resultshop = $mysqli->query("SELECT * FROM `mcc_search` WHERE `shop` = '$shop'")->fetch_assoc();
     if (!$result){
        echo "Ничего не найдено SHOP!";
    }
    $resultcard = $mysqli->query("SELECT * FROM `cards` WHERE `user` = '$user' AND `mcc` = '$mcc'")->fetch_assoc();
    if (!$resultcard){
        echo "Подходящей карты не найдено";
    } else echo "Поиск по МАГАЗИНУ";
    // } else var_dump(json_encode($resultcard + $resultshop));
}
?>