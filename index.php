<!doctype html>

<?php
$lang = "ru";
$title = "ДЗ 5";
require_once 'config/config.php';
require 'config/db_connect.php';


$query = "SELECT * FROM lessons.photos ORDER BY shown_count DESC;";   //' WHERE `` < 30 ";
$result = mysqli_query(myDB_connect(), $query);

$photos = [];
while ($row = mysqli_fetch_assoc($result)) {
    $photos[] = $row;
}
?>


<html lang=<?= $lang ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title><?= $title ?></title>
</head>
<body>

<div style="display: flex; flex-wrap: wrap; flex-direction: row;">
    <?php foreach ($photos as $img) {
     //   print_r(filesize($img['filename']));
        if ($img['is_local']) {
            $link = 'image.php?id=' . $img['id'];
            $image_src = 'images/'.$img['filename'];
            $size = $img['size'].' байт';
            $color = 'black';
            $location = 'Локально';
        }
        else {
            $link = 'image.php?id=' . $img['id'];
            $image_src = $img['filename'];
            $size = 'Не определен';
            $color = '#28a745';
            $location = 'В сети';
        }?>
            <a href="<?= $link ?>" target="_blank" style="text-decoration: none;">
                <div class="card" style="width: 18rem;">
                    <img src="<?= $image_src ?>" class="card-img-top" alt="...">
                    <div class="card-body" style="color: black; text-underline-mode: none;">
                        <div>
                            <h5 class="card-title"> Имя файла </h5>
                            <p class="card-text" style="color: <?= $color ?>;"> <?= $img['filename'] ?></p>
                        </div>
                        <div style="display: flex; flex-direction: row; justify-content: space-between;">
                            <h5 class="card-title"> Размер </h5>
                            <p class="card-text"> <?= $size ?> </p>
                        </div>
                        <div style="display: flex; flex-direction: row; justify-content: space-between;">
                            <h5 class="card-title"> Просмотров </h5>
                            <p class="card-text"> <?= $img['shown_count'] ?></p>
                        </div>
                        <div style="display: flex; flex-direction: row; justify-content: space-between;">
                            <h5 class="card-title"> Расположение </h5>
                            <p class="card-text"> <?= $location?></p>
                        </div>
                    </div>
                </div>
            </a>
            <?php

    }
    ?>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>
