<?php

/**
 * Creates a dropdown from database names
 * and sets the selected person by parameter id.
 */
function exerciseDropdown($selectedId = -1){
    // Get DB connection
    require_once MODULES_DIR.'db.php';
    // Create SQL query to get all rows from a table
    $sql = "SELECT ExerciseType, ExerciseID FROM exercise";
    // Execute the query
    $exercise = $pdo->query($sql);

    // Check if any was returned and create 
    if ( $exercise->rowCount() > 0 ){
        echo '<label for="exercise">Valitse reeni:</label>
        <select name="exercise" id="exercise">';

        // Loop till there are no more rows
        foreach($exercise as $row){
            echo '<option value="'
                . $row["ID"] .'"'
                .($row["ID"] == $selectedId ? ' selected' : ''). '>' 
                . $row["exercise"]. ' ' 
                .'</option>';
        }
        echo "</select><br/>";
    }
}


?>