<?php

echo '<form action="addExercise.php" method="post"';


include 'personDropdown.php';
include 'exerciseDropdown.php';

personDropdown();
exerciseDropdown();

echo'<label for="reps">Reps</label><br>
<input type="number" name="reps" id="reps" ><br>
<label for="weight">Weight</label><br>
<input type="number" name="weight" id="weight" ><br> 
<input type="submit" class="btn btn-primary" value="lisää reeni">
</from>';