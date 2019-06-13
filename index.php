<!doctype html>

<?php
$lang = "ru";
$title = "Главная страница";
$today = getdate();
?>


<html lang=<?= $lang ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
</head>
<body style="display: flex; flex-direction: column; justify-content: space-between; height: calc(100vh - 20px);">
<main>
    <h1>Задание 1</h1>
    <?php
    $a = rand(-100, 100);
    $b = rand(-100, 100);
    if (!($a < 0) and !($b < 0)) {
        echo "$a - $b = " . ($a - $b);
    } elseif (($a < 0) and ($b < 0)) {
        echo "$a * $b = " . ($a * $b);
    } else {
        echo "$a + $b = " . ($a + $b);
    }
    ?>

    <h1>Задание 2</h1>
    <?php
    $a = rand(0, 15);
    switch ($a) {
        case 1:
            echo $a . " ";
            $a++;
        case 2:
            echo $a . " ";
            $a++;
        case 3:
            echo $a . " ";
            $a++;
        case 4:
            echo $a . " ";
            $a++;
        case 5:
            echo $a . " ";
            $a++;
        case 6:
            echo $a . " ";
            $a++;
        case 7:
            echo $a . " ";
            $a++;
        case 8:
            echo $a . " ";
            $a++;
        case 9:
            echo $a . " ";
            $a++;
        case 10:
            echo $a . " ";
            $a++;
        case 11:
            echo $a . " ";
            $a++;
        case 12:
            echo $a . " ";
            $a++;
        case 13:
            echo $a . " ";
            $a++;
        case 14:
            echo $a . " ";
            $a++;
        case 15:
            echo $a . " ";
            $a++;
    }

    ?>
    <h1>Задание 3</h1>
    <p>Реализовано в коде. Смотреть исходный код.</p>
    <?php
    function sum($a, $b)
    {
        return $a + $b;
    }

    function razn($a, $b)
    {
        return $a - $b;
    }

    function division($a, $b)
    {
        return ($b !== 0) ? ($a / $b) : "Ошибка";
    }

    function multi($a, $b)
    {
        return $a * $b;
    }

    ?>
    <h1>Задание 4</h1>
    <p>Реализовано в коде. Смотреть исходный код.</p>
    <?php
    function mathOperation($arg1, $arg2, $arg3)
    {
        switch ($arg3) {
            case "+":
                return sum($arg1, $arg2);
                break;
            case "-":
                return razn($arg1, $arg2);
                break;
            case "*":
                return multi($arg1, $arg2);
                break;
            case "/":
                return division($arg1, $arg2);
                break;
        }
    }

    ?>
</main>
<div style="display:flex; justify-content: space-between; flex-direction: column;">
    <h1>Задание 5</h1>
    <footer>
        <hr>
        <p>На дворе <?= date('Y') ?> год.</p>
    </footer>
</div>
</body>
</html>
