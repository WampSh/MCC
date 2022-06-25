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
        <h2 class="m-3 mb-5">Какой картой лучше платить</h2>
    </head>
    <main>
      
        <div class="main">
        <form action="rqstsql.php" method="post">
            <h3>Поиск по категории покупки:</h3>
            <div class="cat-search">
                <div class="shop-search">
                    <input class="catt form-input" type="text" name="cat">
                    <table class="flymenu"></table>
                </div>
            </div>
            <br>

            <h3>Поиск по магазину:</h3>
            <div class="shop-search">
                <div class="input-group">
                    <input class="shop form-input" type="text" name="shop">
                    <table class="flymenu"></table> 
                </div>
            </div>
            <br>

            <h3>Поиск по Карте:</h3>
            <div class="card-search">
                <div class="input-group">
                    <select class="form-select" name="card">
                        <option selected>Поиск по карте</option>
                        <option value="1">Тинькофф Дима</option>
                        <option value="2">Тинькофф Оля</option>
                        <option value="3">Хомяк</option>
                    </select>
                </div>
            </div>
            <br>

            <h3>Поиск по MCC:</h3>        
            <div class="mcc-search">
                    <input class="form-input mcc" type="text" name="mcc">
                    <input class="btn-outline-secondary btn mt-3" type="submit" value="Найти">
                    <a href="addshop.php" class="add-shop btn-outline-secondary btn mt-3">Добавить магазин</a>
                    <a href="addcard.php" class="add-card btn-outline-secondary btn mt-3">Добавить карту</a>
                    <a href='#' class="add-user btn-outline-secondary btn mt-3">Войти</a>
            </div>
        </form>
        <!-- Открываем окно регистрации пользователя -->

        <div class="add-user-window">
        <h2 class="label-auth m-3 mb-5">Авторизация</h2>
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
                <span class="error"></span>

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