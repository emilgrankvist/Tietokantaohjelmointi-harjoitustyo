<?php

function getPdoConnection() {
    $init = parse_ini_file(BASE_DIR."config.ini");
    $host = $init["host"];
    $db = $init["database"];
    $user = $init["user"];
    $password = $init["password"];

    $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

    try {
        $pdo = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    return $pdo;
}