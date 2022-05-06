<?php

include TEMPLATES_DIR.'head.php';
include MODULES_DIR.'exercise.php';

$id = filter_input(INPUT_GET, "id");

if(isset($id)) {
    try{
        deleteExcersice($id);
        echo '<div class="alert alert-success" role="alert">Harjoitus poistettu!</div>';
    } catch (Exception $e){
        echo '<div class="alert alert-danger" role="alert">'.$e->getMessage().'</div>';
    }
}

$exercises = getExercise();
// Print exercise list
echo "<h5><h5>"
."<ul>";
foreach($exercises as $x){
    echo "<li>".$x["ExerciseType"].'<a href=exercise.php?id='.$x["ExerciseID"].'"class="btn btn-primary">Poista</a> </li>'
    .'<style>
    a { 
        padding: 15px; 
    } 
    </style>';
}
echo "</ul>";

    $exercise = filter_input(INPUT_POST, "exercise");

    if(isset($exercise)) {
        try {
            addExercise($exercise);
            echo '<div class="alert alert-success" role="alert">Harjoitus lisätty!</div>';
        }catch (Exception $e) {
            echo '<div class="alert alert-danger" role="alert">'.$e->getMessage().'</div>';
        }
    }