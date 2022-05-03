<?php

require 'db.php';

$username = "Juhosk";

$sql = "insert into users (username) values ('Juho Karppinen')";

$numberofinserted = $pdo->exec($sql);

echo "Inserted " . $numberofinserted . " rows.";