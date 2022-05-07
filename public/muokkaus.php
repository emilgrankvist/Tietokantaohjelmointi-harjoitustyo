<?php

include TEMPLATES_DIR.'head.php';
include MODULES_DIR.'exercise.php';

    $ExerciseType = filter_input(INPUT_POST, "ExerciseType");

    if(isset($ExerciseType)) {
        try{
            Edit($ExerciseType);
            echo '<div class="alert alert-success" role="alert">Harjoitus muokattu!</div>';
        } catch (Exception $e){
            echo '<div class="alert alert-danger" role="alert">'.$e->getMessage().'</div>';
        }
    }

?>

<form action="muokkaus.php" method="post">
    <label for="ExerciseType">Harjoitus nimenvaihto </label><br>
    <input type="text" name="ExerciseType" id="ExerciseType"><br>
    <input type="submit" class="btn btn-primary" value="Vahvista">
 </form>

<?php include TEMPLATES_DIR.'foot.php'; ?>