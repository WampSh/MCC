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
        <h2 class="m-3 mb-5">Добавление карты</h2>
    </head>
    <main>

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

                <input class="btn btn-outline-secondary mt-3" type="submit" value="Добавить карту">
            </form>


        </div>
    </main>
    <footer>

    </footer>
    <!-- Пакет JavaScript с Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="script.js"></script>
</body>
</html>