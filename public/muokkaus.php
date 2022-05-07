<?php

include TEMPLATES_DIR.'head.php';
include MODULES_DIR.'user.php';

    $exerciseID = filter_input(INPUT_POST, "exercise");
    $usersID = filter_input(INPUT_POST, "person");
    $reps = filter_input(INPUT_POST, "reps", FILTER_SANITIZE_NUMBER_INT);
    $weight = filter_input(INPUT_POST, "weight", FILTER_SANITIZE_NUMBER_INT);


    if(isset($reps, $weight, $usersID, $exerciseID)) {
        try {
            Edit($reps, $weight, $usersID, $exerciseID);
            echo '<div class="alert alert-success" role="alert">Muokattu!</div>';
        }catch (Exception $e) {
            echo '<div class="alert alert-danger" role="alert">'.$e->getMessage().'</div>';
        }
    }

?>

<form action="reenilista.php" method="post">
    <label for="reps">Toistot</label><br>
    <input type="text" name="reps" id="reps"><br>
    <label for="weight">Paino (kg)</label><br>
    <input type="text" name="weight" id="weight"><br>
    <label for="usersID">Nimi ID</label><br>
    <input type="text" name="usersID" id="usersID"><br>
    <label for="ExerciseID">Reeni ID</label><br>
    <input type="text" name="ExerciseID" id="ExerciseID"><br>
    <input type="submit" class="btn btn-primary" value="Muokkaa tietoja">
 </form>

<?php include TEMPLATES_DIR.'foot.php'; ?>