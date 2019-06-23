<?php

function myDB_connect () {

    $defaultConfig = require 'config/db.default.php';
    if (!file_exists(ROOT_DIR . 'config/db.php')) {
                $localConfig = [];
    } else {
        $localConfig = require ROOT_DIR . 'config/db.php';
    }

    $config = array_merge($defaultConfig, $localConfig);

    $mysqli = mysqli_connect(
        $config['db_host'],
        $config['db_user'],
        $config['db_pass'],
        $config['db_name']

    );

    return $mysqli;
}

