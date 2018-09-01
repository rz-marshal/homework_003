<?php

require_once "src/functions.php";

//запуск буферизации вывода
ob_start();



?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>ДЗ №3, Владислав Маршал</title>
</head>
<body>
<div class="container">
    <div class="row">
            <h1>Вывод XML</h1>
            <?= $content ?>
    </div>
</div>
</body>
</html>