<?php

/**
 * Creates a dropdown from database names
 * and sets the selected person by parameter id.
 */
function PersonDropdown($selectedId = -1){
    include MODULES_DIR.'user.php';

    $people = getUser();

    echo '<select name="person" id="person">';
        // Loop till there are no more rows
    foreach($people as $p){
        echo '<option value="'
            . $p["ID"] .'"'
            .($p["ID"] == $selectedId ? ' selected' : ''). '>' 
            . $p["username"]. ' ' 
            
            .'</option>';
    }
    echo "</select><br/>";
}

function ExerciseDropdown($selectedId = -1){
    require_once MODULES_DIR.'exercise.php';
    
    $exercise = getExercise();

    echo '<select exercise="exercise" id="exercise">';
    // Loop till there are no more rows
foreach($exercise as $e){
    echo '<option value="'
        . $e["ExerciseID"] .'"'
        .($e["ExerciseID"] == $selectedId ? ' selected' : ''). '>' 
        . $e["ExerciseType"]. ' '
          
        
        .'</option>';
}
    
}