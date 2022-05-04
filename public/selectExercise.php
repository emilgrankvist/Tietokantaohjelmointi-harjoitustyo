<?php
include TEMPLATES_DIR.'head.php';
include TEMPLATES_DIR.'personDropdown.php';
include MODULES_DIR.'addExercise.php';



$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
$exercise = filter_input(INPUT_POST, "ExerciseID", FILTER_SANITIZE_NUMBER_INT);
$reps = filter_input(INPUT_POST, "reps", FILTER_SANITIZE_NUMBER_INT);
$weight = filter_input(INPUT_POST, "weight", FILTER_SANITIZE_NUMBER_INT);

if(isset($username)) {
    enterExercise($username,$exercise,$reps,$weight);
    echo '<div class="alert alert-success" role="alert">Harjoitus lisästty!</div>';
}
?>


<form action="addExercise.php" method="post">
<?php personDropdown();
exerciseDropdown(); echo "<br>" ?>
<label for="reps">Reps</label><br>
<input type="number" name="reps" id="reps" ><br>
<label for="weight">Weight</label><br>
<input type="number" name="weight" id="weight" ><br> 
<input type="submit" class="btn btn-primary" value="Lisää reeni">
</form>




