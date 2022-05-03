<?php

$init = parse_ini_file("config.ini");
$host = $init["host"];
$db = $init["database"];
$user = $init["user"];
$pw = $init["password"];

$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
try {
    $pdo = new PDO($dsn, $user, $pw);
    echo "Connected! ";
} catch (PDOException $e) {
    echo $e->getMessage();
}