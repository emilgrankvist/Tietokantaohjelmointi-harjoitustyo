<?php

function getExercise() {
    require_once MODULES_DIR.'db.php';

    try {
        $pdo = getPdoConnection();
        $sql = "SELECT * FROM exercise";
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

function enterExercise($ExerciseID, $usersID, $reps, $weight) {
    require_once MODULES_DIR.'db.php'; 

    
    if( !isset($ExerciseID) || !isset($reps) || !isset($weight) ){
        
        exit;
    }

   
    if( empty($reps) || empty($weight) ){
        echo "Täytäthän kaikki kohdat!";
        exit;
    }

    try{
        $pdo = getPdoConnection();
        $sql = "INSERT INTO exercises (ExerciseID, usersID, reps, weight) VALUES (?,?,?,?)";
        $statement = $pdo->prepare($sql);
        $statement->execute( array($ExerciseID, $usersID, $reps, $weight) );

    }catch(PDOException $e){
        echo $e->getMessage();
    }

}

/* Edit funktio  */

function Edit($ExerciseID, $usersID, $reps, $weight) {
    require_once MODULES_DIR.'db.php';

    if( !isset($ExerciseID) || !isset($reps) || !isset($weight) ){
        
    }

    //tarkistetaan ettei ole tyhjiä arvoja

    if(empty($username) || empty($password)) {
        throw new Exception("Tyhjää arvoa ei voida laittaa");
    }

    try{
        $pdo = getPdoConnection();
        $sql = "UPDATE exercises SET reps=?, weight=?, usersID=?, ExerciseID=?";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(1, $weight);
        $statement->bindParam(2, $reps);
        $statement->bindParam(3, $usersID);
        $statement->bindParam(4, $ExerciseID);
        $statement->execute();

        echo "Tiedot muokattu!";
    } catch (PDOException $e) {
        throw $e;
    }
}

/* Reenilista funktio */

function Reenilista() {
    require_once MODULES_DIR.'db.php';

    try{
        $pdo = getPdoConnection();

        $sql = "SELECT username, ExerciseType, reps, weight, exercises.ID
        FROM users, exercise, exercises
        WHERE users.id = exercises.usersID AND exercises.ExerciseID = exercise.ExerciseID
        ORDER BY username;";
        $exercises = $pdo->query($sql);
        return $exercises->fetchAll();



    } catch(PDOException $e){
        echo $e->getMessage();
    } 
}

function deleteExcersice($id) {
    require_once MODULES_DIR.'db.php';

    if (!isset($id)) {
        throw new Exception("Parametreja puuttuu! Harjoitusta ei voida poistaa!");
    }

    try {
        $pdo = getPdoConnection();
        $pdo->beginTransaction();
        $sql = "DELETE FROM exercises WHERE exerciseID = ?";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();

        $sql = "DELETE FROM exercise WHERE exerciseID = ?";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(1,$id);
        $statement->execute();

        $pdo->commit();
    } catch(PDOException $e) {
        $pdo->rollBack();
        throw $e;
    }
}



function deleteListaLog($Log) {
        require_once MODULES_DIR.'db.php';
    
        if (!isset($Log)) {
            throw new Exception("Parametreja puuttuu! Harjoitusta ei voida poistaa!");
        }
    
        try {
            $pdo = getPdoConnection();
            $pdo->beginTransaction();
            $sql = "DELETE FROM exercises WHERE ID = ?";
            $statement = $pdo->prepare($sql);
            $statement->bindParam(1,$Log);
            $statement->execute();
    
            $pdo->commit();
        } catch(PDOException $e) {
            $pdo->rollBack();
            throw $e;
        }
    }
