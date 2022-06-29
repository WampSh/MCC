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
        <h2 class="m-3 mb-5">* Cashback Helper *</h2>
    </head>
    <main>
        <div class="main">
            <h2>Поиск по базе данных</h2>
            <form action="rqstsql.php" method="post" class="search-form" >
                <h3>Поиск по категории покупки:</h3>
                <div class="cat-search">

                        <input class="catt form-input" type="text" name="cat">
                        <table class="flymenu-cat"></table>

                </div>
                <br>

                <h3>Поиск по магазину:</h3>
                <div class="shop-search">

                        <input class="shop form-input" type="text" name="shop" autocomplete="off">
                        <table class="flymenu-shop"></table> 

                </div>
                <br>

                <h3>Поиск по Карте:</h3>
                <div class="card-search">
                    <div class="input-group">
                        <select class="cards form-select" name="card">
                            <option value="no" disabled selected>Поиск по карте</option>
                        </select>
                    </div>
                </div>
                <br>

                <h3>Поиск по MCC:</h3>        
                <div class="mcc-search btnblock">
                        <input class="form-input mcc" type="text" name="mcc">
                        <a href="#" class="search btn-outline-secondary btn mt-3">Поиск</a>
                        <a href="#" class="add-shop btn-outline-secondary btn mt-3">Добавить магазин</a>
                        <a href="#" class="add-card btn-outline-secondary btn mt-3">Добавить карту</a>
                        <a href="#" class="add-user btn-outline-secondary btn mt-3">Войти</a>
                </div>
            </form>
        </div>
        <!-- Открываем окно регистрации пользователя -->

        <div class="add-user-window hiden">
        <h2 class="label-auth m-3 mb-5">Авторизация</h2>
            <form action="authobr.php" method="POST" class="authform">
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
        <div class="result-window hiden"></div>
        <div class="card-name"></div>

    
<!-- -------------------------------------------------------------------- -->

        <div class="add-card-page hiden">
            <h2 class="m-3 mb-5">Добавление карты</h2>

            <div class="main">
                <form action="addcardsql.php" method="post">
                    <h3>Название карты:</h3>
                    <div class="card-add">
                        <input class="form-select form-input" type="text" name="card">
                    </div>

                    <br>

                    <h3>Бонусные MCC:</h3>        
                    <div class="bonusmcc-add">
                        <input class="form-select form-input" type="text" name="bonusmcc">
                    </div>
                    <br>

                    <h3>Размер бонуса:</h3>        
                    <div class="bonus-add">
                        <input class="form-select form-input" type="text" name="bonus">
                    </div>
                    <br>

                    <h3>Период действия бонуса:</h3>        
                    <div class="period-add">
                        <input class="form-select form-input" type="text" name="period">
                    </div>
                    <br>

                    <h3>Примечание:</h3>        
                    <div class="remcard-add">
                        <input class="form-select form-input" type="text" name="remcard">
                    </div>
                    <div class="btnblock">
                        <input class="btn btn-outline-secondary mt-3" type="submit" value="Добавить карту">
                        <a href="#" class="back btn btn-outline-secondary mt-3">Назад</a>
                    </div>
                </form>
            </div>
        </div>

<!----------------------------------------------------------------------- -->
        <div class="add-shop-page hiden">
            <h2 class="m-3 mb-5">Добавление магазина</h2>
            <div class="main">
                <form action="addsql.php" method="post">
                    <h3>Название магазина:</h3>
                    <div class="shop-add">
                        <input class="form-select form-input" type="text" name="shop">
                    </div>

                    <br>

                    <h3>MCC:</h3>        
                    <div class="mcc-add">
                        <input class="form-select form-input" type="text" name="mcc">
                    </div>
                    <br>

                    <h3>Адрес магазина:</h3>        
                    <div class="addr-add">
                        <input class="form-select form-input" type="text" name="addr">
                    </div>
                    <br>

                    <h3>Дополнительный MCC:</h3>        
                    <div class="addmcc-add">
                        <input class="form-select form-input" type="text" name="addmcc">
                    </div>
                    <br>

                    <h3>Примечание:</h3>        
                    <div class="rem-add">
                        <input class="form-select form-input" type="text" name="rem">
                    </div>
                    <div class="btnblock">
                        <input class="btn btn-outline-secondary mt-3" type="submit" value="Добавить">
                        <a href="#" class="back btn btn-outline-secondary mt-3">Назад</a>
                    </div>
                </form>
            
            </div>
        </div>


    </main>
    <footer>
   
    </footer>
    <!-- Пакет JavaScript с Popper -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script> -->
<script>
    let username = `<?php echo($_SESSION['username']) ?>`;

</script>
<script src="script.js"></script>
</body>
</html>