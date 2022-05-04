<?php


function enterExercise($username, $exercise, $reps, $weight) {
    require_once MODULES_DIR.'bp.php';

if( !isset($_POST["username"]) || !isset($_POST["ExerciseID"]) || !isset($_POST["reps"]) || !isset($_POST["weight"]) ) {
     echo "Parametrejä puuttui, Ei voida lisätä tyäaikaa.";
    exit;
}



if( empty($reps) || empty($weight) ){
    echo "Et voi asettaa tyhjiä arvoja!";
    exit;
}

try{
    $sql = "insert into workoutexercise (ExerciseID, WorkoutID, reps, weight) values ('$ExerciseID', '$reps', '$weight')";
    $pdo->exec($sql);
    echo "Harjoitus lisätty";
}catch(PDOException $e){
    echo "Jokin meni pieleen.<br>";
    echo $e->getMessage();
}}


   