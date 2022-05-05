<?php
require_once MODULES_DIR.'db.php';

$sql = "Select * from users";
$pdo = getPdoConnection();
$users = $pdo->query($sql);

if ( $users->rowcount() > 0 ) {
    echo "<ul>";
    while ( $row = $users->fetch() ) {
        echo "<li>" . $row ["username"]. "</li>";
    } 
    echo "</ul>";
    
}
