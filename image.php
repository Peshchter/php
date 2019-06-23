<?php
$lang = "ru";
$title = "ДЗ 5";
require_once 'config/config.php';
require 'config/db_connect.php';
$id = $_GET['id'];
if ($id > 0) {
    $query = "SELECT * FROM lessons.photos WHERE id=". $id."; ";   //' WHERE `` < 30 ORDER BY age DESC;";

    $result = mysqli_fetch_assoc(mysqli_query(myDB_connect(), $query));

    if ($result['is_local']) {
        $link = 'images/' . $result['filename'];
    } else {
        $link = $result['filename'];
    }
    $query_update = "UPDATE lessons.photos SET shown_count = ". ++$result['shown_count']. " WHERE id = ".$id. ";";

    mysqli_query(myDB_connect(), $query_update);

}
else{
    header("Location: index.php");
}
?>
<!doctype html>
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
<div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                <img src="<?= $link ?>" alt="...">
    <div>
        <h5 class="card-title"> Имя файла </h5>
        <p class="card-text" > <?= $result['filename'] ?></p>
    </div>
    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
        <h5 class="card-title"> Размер (в байтах)</h5>
        <p class="card-text"> <?= $result['size'] ?> </p>
    </div>
    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
        <h5 class="card-title"> Просмотров </h5>
        <p class="card-text"> <?= $result['shown_count'] ?></p>
    </div>
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
