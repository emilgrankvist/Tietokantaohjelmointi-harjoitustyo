<?php

require 'src/modules/db.php';

$username = $_GET["username"];

$sql = "insert into users (username) values ('$username')";

$numberofinserted = $pdo->exec($sql);

echo "Inserted " . $numberofinserted . " rows.";