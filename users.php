<?php

require 'db.php';

$sql = "Select * from users";
$users = $pdo->query($sql);

if ( $users->rowcount() > 0 ) {
    echo "<ul>";
    while ( $row = $users->fetch() ) {
        echo "<li>" . $row["id"] . " " . $row ["username"]. "</li>";
    } 
    echo "</ul>";
}
