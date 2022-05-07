<?php

include TEMPLATES_DIR.'head.php';
include MODULES_DIR.'exercise.php';
include TEMPLATES_DIR.'personDropdown.php';

$id = filter_input(INPUT_GET, "id");

// Poisto issetti
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
echo "<h5>Harjoitukset:<h5>"
."<br>"
."<ul>";
foreach($exercises as $x){
    echo "<li>".$x["ExerciseType"].'<a href=exercise.php?id='.$x["ExerciseID"].'"type="button" class="btn btn-danger">Poista</a>
    
    </li>'
    .'<style>
    a { 
        padding: 20px;
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

?>

<form action="exercise.php" method="post">
    <label for="exercise">Harjoitus:</label><br>
    <input type="text" name="exercise" id="exercise"><br>
    <input type="submit" class="btn btn-primary" value="Lisää harjoitus">
 </form>

 <?php


?>



<?php include TEMPLATES_DIR.'foot.php'; ?>