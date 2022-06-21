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
    <div>
        <div class="main">
            <h3>Поиск по категории покупки:</h3>
            <div class="cat-search">
                <form action="rqstlisten.php" method="post">
                    <div class="input-group">
                        <select class="form-select" name="cat">
                            <option value="1">Супермаркет</option>
                            <option value="2">Спорт товары</option>
                            <option value="3">Развлечения</option>
                        </select>
                        <input class="btn btn-outline-secondary" type="submit" value="Найти">
                    </div>
                <!-- </form> -->
            </div>
            <br>

            <h3>Поиск по магазину:</h3>
            <div class="shop-search">
                <!-- <form action="#" method="post"> -->
                    <div class="input-group">
                        <select class="form-select" name="shop">
                            <option value="1">д.26 к.1</option>
                            <option value="2">"Вкусняшка" 28 к.1</option>
                            <option value="3">Дикси</option>
                        </select>
                        <input class="btn btn-outline-secondary" type="submit" value="Найти">
                    </div>
                <!-- </form> -->
            </div>
            <br>

            <h3>Поиск по Карте:</h3>
            <div class="card-search">
                <!-- <form action="rqstlisten.php" method="post"> -->
                    <div class="input-group">
                        <select class="form-select" name="card">
                            <option selected>Поиск по карте</option>
                            <option value="1">Тинькофф Дима</option>
                            <option value="2">Тинькофф Оля</option>
                            <option value="3">Хомяк</option>
                        </select>
                        <input class="btn btn-outline-secondary" type="submit" value="Найти">
                    </div>
                <!-- </form> -->
            </div>
            <br>

            <h3>Поиск по MCC:</h3>        
            <div class="mcc-search">
                <form action="rqstlisten.php" method="post">
                    <input type="text" name="mcc">
                    <input class="btn btn-outline-secondary" type="submit" value="Найти">
                </form>
            </div>
        </div>
    </main>
    <footer>

    </footer>
    <!-- Пакет JavaScript с Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="script.js"></script>
</body>
</html>