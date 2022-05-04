<?php
include TEMPLATES_DIR.'head.php';
include TEMPLATES_DIR.'personDropdown.php';


echo '<form action="addExercise.php" method="post"';





personDropdown();
exerciseDropdown();

echo'<label for="reps">Reps</label><br>
<input type="number" name="reps" id="reps" ><br>
<label for="weight">Weight</label><br>
<input type="number" name="weight" id="weight" ><br> 
<input type="submit" class="btn btn-primary" value="lisää reeni">
</from>';