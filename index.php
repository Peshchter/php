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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title><?= $title ?></title>
</head>
<body>
<h1>Задание 1</h1>
<?php
$a = 0;
while ($a <= 100) {
    if ($a % 3 == 0) {
        echo $a . " ";
    };
    $a++;
}
?>
<h1>Задание 2</h1>
<?php
$a = 0;
do {
    if ($a == 0) {
        echo $a . " - нуль.";
    } else {
        if ($a % 2 == 0) {
            echo $a . " - четное число.";
        } else {
            echo $a . " - нечетное число.";
        }
    }
    ?>
    <br>
    <?php
    $a++;
} while ($a <= 10);
?>
<h1>Задание 3</h1>
<?php
$m = [
    "Московская область" => ["Москва", "Зеленоград", "Клин"],
    "Пермский край" => ["Пермь", "Чайковский", "Краснокамск", "Верещагино"],
    "Удмуртская республика" => ["Ижевск", "Воткинск", "Глазов", "Можга"],
    "Республика Татарстан" => ["Казань", "Нижнекамск", "Набережные челны", "Менделеевск"],
];

foreach ($m as $region => $cities) {
    echo $region . ":" . "<br>";
    echo join(", ", $cities) . "<br>";
}
?>
<h1>Задание 4</h1>
<?php

function translit($arg)
{
    $letters = [
        'a' => 'a', 'ё' => 'io', 'м' => 'm', 'т' => 't', 'ш' => 'sh', 'ю' => 'yu',
        'б' => 'b', 'ж' => 'zh', 'н' => 'n', 'у' => 'u', 'щ' => 'shch', 'я' => 'ya',
        'в' => 'v', 'з' => 'z', 'о' => 'o', 'ф' => 'f', 'ъ' => '', 'й' => 'i',
        'г' => 'g', 'и' => 'i', 'п' => 'p', 'х' => 'h', 'ы' => 'i',
        'д' => 'd', 'к' => 'k', 'р' => 'r', 'ц' => 'ts', 'ь' => '',
        'е' => 'e', 'л' => 'l', 'с' => 's', 'ч' => 'ch', 'э' => 'e'
    ];
    $arg = mb_strtolower($arg);

    foreach ($letters as $rus => $eng) {
        $arg = str_replace($rus, $eng, $arg);
    }

    return $arg;
}

echo translit("Привет всем!");

?>
<h1>Задание 5</h1>
<?php
function unspacing($arg){

    return str_replace(" ", "_", $arg);
}
echo unspacing("пример строки для замены пробелов");
?>
<h1>Задание 6</h1>

<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Регионы
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <?php
      foreach ($m as $region => $cities) {
    ?>
      <a class="dropdown-item dropright" href="#">
          <?=$region?>
      </a> <?php
//    echo join(", ", $cities) . "<br>";
}
    ?>
  </div>
</div>

<h1>Задание 7</h1>
<?php
for ($x = 0; $x < 10; print_r($x++)) {
}
?>
<h1>Задание 9</h1>
<p>Скомбинировано в коде</p>
<?php
function prepare($arg) {
    return translit(unspacing($arg));
}
?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
