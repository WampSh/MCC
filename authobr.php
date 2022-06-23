<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
require_once('components/db.php');

$username = htmlspecialchars( trim($_POST['username']));
$password = htmlspecialchars( trim($_POST['pass']));
$checkpass = htmlspecialchars( trim($_POST['checkpass']));
$auth = $_POST['auth'];


if (empty($username) || empty($password)){
    exit("Не все поля заполнены");
} elseif ($auth == true) {
    $result = $mysqli -> query("SELECT * FROM `users` WHERE `username` = '$username'") -> fetch_assoc();

    if (isset($result) && password_verify($password, $result['password'])){
        $_SESSION['username'] = $result['username'];
        exit("ok") ;

    } else exit('Не верный логин или пароль');
} elseif ($auth == false && $password == $checkpass){
    $password = password_hash($password, PASSWORD_BCRYPT);    
    $result = $mysqli -> query("INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$password')");
    if ($result){
        $_SESSION['username'] = $result['username'];
        exit("ok");  
    } else exit("Ошибка базы данных");
} else exit('Пароли не совпадают');
?>