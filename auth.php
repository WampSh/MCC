<?php session_start() ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MCC Shops</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body class="m-3">
    <head>
        <h2 class="label-auth m-3 mb-5">Авторизация</h2>
    </head>
    <main>
        <div class="main">
            <form action="authobr.php" method="POST" class="form">
                <Label>Введите логин:</Label>
                <input class="form-select form-input" type="text" name="username" placeholder="Введите логин">
                <Label>Введите пароль:</Label>
                <input class="form-select form-input" type="password" name="pass">
                <div class="reg">
                    <Label>Повторите пароль:</Label>
                    <input class="form-select form-input" type="password" name="checkpass">
                </div>
                <input class='hiden' type="checkbox" name="auth" checked>
                <input class="regbtn btn btn-outline-secondary mt-3" type="submit" value="Войти">

            </form>
            <div class="regon">Зарегистрироваться</div>
        </div>
    </main>
    <footer>

    </footer>
    <!-- Пакет JavaScript с Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="script.js"></script>
</body>
</html>