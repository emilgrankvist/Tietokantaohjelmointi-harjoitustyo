<?php

require 'src/modules/db.php';

$sql = "Select * from users";
$users = $pdo->query($sql);

if ( $users->rowcount() > 0 ) {
    echo "<ul>";
    while ( $row = $users->fetch() ) {
        echo "<li>" . $row ["username"]. "</li>";
    } 
    echo "</ul>";
    echo '<a class="btn btn-primary" href="adduser.php" role="button">Lisää käyttäjä"</a>';
}