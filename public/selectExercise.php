<?php
include TEMPLATES_DIR.'head.php';
include TEMPLATES_DIR.'personDropdown.php';
include MODULES_DIR.'exercise.php';



$exerciseID = filter_input(INPUT_POST, "exercise");
$usersID = filter_input(INPUT_POST, "person");
$reps = filter_input(INPUT_POST, "reps", FILTER_SANITIZE_NUMBER_INT);
$weight = filter_input(INPUT_POST, "weight", FILTER_SANITIZE_NUMBER_INT);
$userworkoutID = filter_input(INPUT_GET, "", FILTER_SANITIZE_NUMBER_INT);

if(isset($usersID)) {
        enterExercise($exerciseID, $usersID, $reps, $weight, $userworkoutID);
        echo '<div class="alert alert-success" role="alert">Harjoitus lisätty!</div>';
}


$selectedID = isset($usersID) ? $usersID : 0;

?>

</form>
<form action="selectExercise.php" method="post">

    <?php personDropdown($selectedID); exerciseDropdown(); ?>

    <label for="reps">Toistot</label><br>
    <input type="number" name="reps" id="reps" ><br>
    <label for="weight">Paino</label><br>
    <input type="number" name="weight" id="weight" ><br> 
    <input type="submit" class="btn btn-primary" value="Lisää reeni">
</form>



<?php include TEMPLATES_DIR.'foot.php'; ?>
