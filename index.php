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
    <h1>Текущее время: <?php $today['hours'] ?> часов, <?php $today['minutes']?> минут, <?php $today['seconds']?> секунд.</h1>
    <h1>Дата: <?php $today['mday']?>.<?php $today['month']?>.<?php $today['year']?></h1>
</body>
</html>
