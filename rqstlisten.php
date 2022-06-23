<?php
header('Content-Type: text/html; charset=utf-8');
require_once('components/db.php');

$cat = $_POST['cat'];
$shop = $_POST['shop'];
$mcc = $_POST["mcc"];
$card = $_POST["card"];
if ($shop != 1){
    $result = $mysqli->query("SELECT * FROM `mcc_search` WHERE `shop` = '$shop'")->fetch_assoc();
     if (!$result){
        echo "Ничего не найдено SHOP!";
    }
}
elseif($cat != 1){
    $result = $mysqli -> query("SELECT * FROM `mcc_search` WHERE `cat` = '$cat'") -> fetch_assoc();
    if (!$result){
        echo "Ничего не найдено CAT!";
    }
}
echo $result['cat'];

?>
<!-- 
wamps_mcc
mcc_search
%DN0hJuH -->