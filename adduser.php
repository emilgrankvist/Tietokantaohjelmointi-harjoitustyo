<?php

require 'src/modules/db.php';

if( empty($_POST["username"])) {
    echo "Lisää käyttäjätunnus";
    exit;
}

$username = $_POST["username"];

try {
    $sql = "insert into users (username) values ('$username')";
    $pdo->exec($sql);
    echo "Tervetuloa ".$username;
}catch(PDOException $e){
    echo "Jokin meni pieleen.<br>";
    echo $e->getMessage();
}

