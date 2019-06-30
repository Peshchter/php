<!doctype html>

<?php
$lang = "ru";
$title = "Главная страница";
$today = getdate();

require_once('functions.php');
$result = $_REQUEST['result'] ?? null;
$first  = $_REQUEST['first'] ?? null;
$operation  = $_REQUEST['operation'] ?? null;
$second  = $_REQUEST['second'] ?? null;
if (isset($first)and(isset($second))and(settype($first, "double"))and(settype($second,"double"))) {
    $result = mathOperation($first,$second, $operation);
};
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
<body style="display: flex; flex-direction: column; justify-content: space-between; height: calc(100vh - 20px);">
<main style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 30vh;">
    <div style="display: flex; flex-direction: row; justify-content: center; align-items: center;">
        <form action="index.php" style="display: flex; flex-direction: row; width: 300px;">
            <input type="number" name="first" placeholder="Число" class="form-control" value="<?=$first?>">
            <select name="operation" class="custom=select" id="operation">
                <option value="+"<?php if ($operation=="+") {echo "selected";}; if (!isset($operation)){echo "selected";};?>>+</option>
                <option value="-"<?php if ($operation=="-") {echo "selected";}?>>-</option>
                <option value="*"<?php if ($operation=="*") {echo "selected";}?>>*</option>
                <option value="/"<?php if ($operation=="/") {echo "selected";}?>>/</option>
            </select>
            <input type="number" name="second" placeholder="Число" class="form-control" value="<?=$second?>">
            <input type="submit" class="btn btn-outline-secondary">
        </form>
    </div>

    <?php if (isset($result)) {
        echo "Ответ: ".$result;
    } ?>
</main>
<div style="display:flex; justify-content: space-between; flex-direction: column;">
    <footer>
        <hr>
        <p>На дворе <?= date('Y') ?> год.</p>
    </footer>
</div>
<script>
    document.addEventListener("keydown", function (event) {
        if (["/", "*", "-", "+"].includes(event.key)) {
            document.getElementById("operation").value = event.key;
        }
    })
</script>
</body>

</html>
