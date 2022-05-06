<?php

function getExercise() {
    require_once MODULES_DIR.'db.php';

    try {
        $pdo = getPdoConnection();
        $sql = "select * from exercise";
        $exercises = $pdo->query($sql);

        return $exercises->fetchAll();
    } catch (PDOException $e) {
        throw $e;
    }
}

function addExercise($exercise){
    require_once MODULES_DIR.'db.php';


    //tarkistetaan onko muuttujia asetettu

    if (!isset($exercise)){
        throw new Exception("Parametreja puuttuu! Harjoitusta ei voida lisätä!");
    }

    //tarkistetaan ettei ole tyhjiä arvoja

    if(empty($exercise)) {
        throw new Exception("Tyhjää arvoa ei voida laittaa");
    }

    try{
        $pdo = getPdoConnection();
        $sql = "insert into exercise (exerciseType) values (?)";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(1, $exercise);

        $statement->execute();

        echo "Harjoitus ".$exercise." on lisätty tietokantaan";
    } catch (PDOException $e) {
        throw $e;
    }
}

function enterExercise($ExerciseID, $userworkoutID, $reps, $weight) {
    require_once MODULES_DIR.'db.php';

if( !isset($_POST["ExerciseID"]) || !isset($_POST["userworkoutID"]) || !isset($_POST["reps"]) || !isset($_POST["weight"]) ) {
     echo "Parametrejä puuttui, Ei voida lisätä harjoitusta.";
    exit;
}



if( empty($reps) || empty($weight) ){
    echo "Et voi asettaa tyhjiä arvoja!";
    exit;
}

try{
    $pdo = getPdoConnection();
    // ampuu tiedot kantaan.
    $sql = "INSERT INTO workoutexercise (ExerciseID, userworkoutID, reps, weight) VALUES (?,?,?,?)";
    $statement = $pdo->prepare($sql);
    $statement->execute( array($ExerciseID, $userworkoutID, $reps, $weight) );

   

    echo "Harjoitus lisätty";
}catch(PDOException $e){
    echo "Jokin meni pieleen.<br>";
    echo $e->getMessage();
}}

function startNewWorkout($username) {
    require_once MODULES_DIR.'db.php';
    $pdo = getPdoConnection();
    $sql = "insert into userworkout (usersID) values (?)";
    $statement = $pdo->prepare($sql);
    $statement->execute();



}

function deleteExcersice($id) {
    require_once MODULES_DIR.'db.php';

    if (!isset($id)) {
        throw new Exception("Parametreja puuttuu! Harjoitusta ei voida poistaa!");
    }

    try {
        $pdo = getPdoConnection();
        $pdo->beginTransaction();
        $sql = "delete from workoutexercise where exerciseID = ?";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();

        $sql = "delete from exercise where exerciseID = ?";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(1,$id);
        $statement->execute();

        $pdo->commit();
    } catch(PDOException $e) {
        $pdo->rollBack();
        throw $e;
    }
}