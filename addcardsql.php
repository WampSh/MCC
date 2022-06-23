<?php
header('Content-Type: text/html; charset=utf-8');
require_once('components/db.php');
$_SESSION['user'] = 'my'; //temp
$user = $_SESSION['user'];
$card = $_POST['card'];
$bonusmcc = json_encode($_POST['bonusmcc']);
$bonus = $_POST['bonus'];
$period = $_POST['period'];
$remcard = $_POST['remcard'];

$result = $mysqli -> query("INSERT INTO `cards` (`user`, `cardname`, `bonusmcc`, `bonus`, `period`, `rem` ) VALUES ('$user', '$card', '$bonusmcc', '$bonus', '$period', '$remcard') ");
    if (!$result){
        echo "Не удалось добавить в базу данных";
    }
echo 'Магазин успешно добавлен';

header('location: ../addcard.php');
?>