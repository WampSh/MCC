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
        <h2 class="m-3 mb-5">Добавление нового магазина</h2>
    </head>
    <main>

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

                <input class="btn btn-outline-secondary mt-3" type="submit" value="Добавить">
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