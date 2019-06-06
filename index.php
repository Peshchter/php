<!doctype html>

<?php
$lang = "ru";
$title = "Главная страница";
$today = getdate();
?>


<html lang=<?=$lang?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$title ?></title>
</head>
<body>
    <h1>Текущее время: <?=$today['hours'] ?> часов, <?= $today['minutes']?> минут, <?= $today['seconds']?> секунд.</h1>
    <h1>Дата: <?= date("d")?>.<?= date("m") ?>.<?= date("y") ?></h1>
</body>
</html>
