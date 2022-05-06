<?php
include TEMPLATES_DIR.'head.php';
include TEMPLATES_DIR.'personDropdown.php';
include MODULES_DIR.'exercise.php';



$usersID = filter_input(INPUT_POST, "usersID", FILTER_SANITIZE_SPECIAL_CHARS);
$exercise = filter_input(INPUT_POST, "ExerciseID", FILTER_SANITIZE_NUMBER_INT);
$reps = filter_input(INPUT_POST, "reps", FILTER_SANITIZE_NUMBER_INT);
$weight = filter_input(INPUT_POST, "weight", FILTER_SANITIZE_NUMBER_INT);

if(isset($usersID)) {
    enterExercise($usersID, $exercise, $reps, $weight);
    echo '<div class="alert alert-success" role="alert">Harjoitus lisätty reenilistaan!</div>';
} 



?>

<form action="selectExercise.php" method="post">

    <?php personDropdown(); exerciseDropdown(); ?>

    <label for="reps">Toistot</label><br>
    <input type="number" name="reps" id="reps" ><br>
    <label for="weight">Paino</label><br>
    <input type="number" name="weight" id="weight" ><br> 
    <input type="submit" class="btn btn-primary" value="Lisää reeni">
</form>



<?php include TEMPLATES_DIR.'foot.php'; ?>
