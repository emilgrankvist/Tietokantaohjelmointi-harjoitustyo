<?php

include TEMPLATES_DIR.'head.php';
include MODULES_DIR.'exercise.php';

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

<?php include TEMPLATES_DIR.'foot.php'; ?>