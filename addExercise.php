<?php
require 'src/modules/db.php';

if( !isset($_POST["username"]) || !isset($_POST["ExerciseID"]) || !isset($_POST["reps"]) || !isset($_POST["weight"]) ) {
     echo "Parametrejä puuttui, Ei voida lisätä tyäaikaa.";
    exit;
}

$username = $_POST["username"];
$exercise = $_POST["ExerciseID"];
$reps = $_POST["reps"];
$weight = $_POST["weight"];

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
}

   