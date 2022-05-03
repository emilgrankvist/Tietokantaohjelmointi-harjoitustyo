<?php

/**
 * Creates a dropdown from database names
 * and sets the selected person by parameter id.
 */
function personDropdown($selectedId = -1){
    // Get DB connection
    require 'src/modules/db.php';
    // Create SQL query to get all rows from a table
    $sql = "SELECT ID, username FROM users";
    // Execute the query
    $username = $pdo->query($sql);

    // Check if any was returned and create 
    if ( $username->rowCount() > 0 ){
        echo '<label for="username">Select person:</label>
        <select name="username" id="username">';

        // Loop till there are no more rows
        foreach($username as $row){
            echo '<option value="'
                . $row["ID"] .'"'
                .($row["ID"] == $selectedId ? ' selected' : ''). '>' 
                . $row["username"]. ' ' 
                .'</option>';
        }
        echo "</select><br/>";
    }
}


?>