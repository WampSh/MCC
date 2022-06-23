<?php
header('Content-Type: text/html; charset=utf-8');
require_once('components/db.php');

$shop = $_POST['shop'];
$mcc = $_POST['mcc'];
$rem = $_POST['rem'];
$addr = $_POST['addr'];
$addmcc = $_POST['addmcc'];
$cat = $mysqli -> query("SELECT * FROM `mcc_codes` WHERE `mcc` = '$mcc'") -> fetch_assoc()['cat'];

$result = $mysqli -> query("INSERT INTO `mcc_search` (`shop`, `addr`, `cat`, `mcc`, `addmcc`, `rem` ) VALUES ('$shop', '$addr', '$cat', '$mcc', '$addmcc', '$rem') ");
    if (!$result){
        echo "Не удалось добавить в базу данных";
    }
echo 'Магазин успешно добавлен';

header('location: addshop.php');
?>