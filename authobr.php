<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
require_once('components/db.php');

$username = htmlspecialchars( trim($_POST['username']));
$password = htmlspecialchars( trim($_POST['pass']));
$checkpass = htmlspecialchars( trim($_POST['checkpass']));
$auth = $_POST['auth'];


if (empty($username) || empty($password)){
    exit (json_encode(array("error" => "Не все поля заполнены")));
} elseif ($auth == true) {
    
    $result = $mysqli -> query("SELECT * FROM `users` WHERE `username` = '$username'") -> fetch_assoc();

    if (isset($result) && password_verify($password, $result['password'])){
        $_SESSION['username'] = $result['username'];
        exit(json_encode(array("OK" => "ok", "username" => $result['username'])));
    } else exit(json_encode(array("error" =>"Не верный логин или пароль")));
} elseif ($auth == false && $password == $checkpass){
    $password = password_hash($password, PASSWORD_BCRYPT);
    $result = $mysqli -> query("INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$password')");
    if ($result){
        $_SESSION['username'] = $result['username'];
        exit(json_encode(array("OK" => "ok", "username" => $result['username'])));
    } else exit(json_encode(array("error" => "Ошибка базы данных")));
} else exit (json_encode(array("error" => "Пароли не совпадают")));
?>