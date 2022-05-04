<?php

function getUser(){
    require_once MODULES_DIR.'db.php';

    try{
        $pdo = getPdoConnection();
        // Create SQL query to get all rows from a table
        $sql = "SELECT * FROM users";
        // Execute the query
        $user = $pdo->query($sql);

        return $user->fetchAll();
    }catch(PDOException $e){
        throw $e;
    }
}

function addUser($user){
    require_once MODULES_DIR.'db.php';


    //tarkistetaan onko muuttujia asetettu

    if (!isset($user)){
        throw new Exception("Parametreja puuttuu! Käyttäjää ei voida lisätä!");
    }

    //tarkistetaan ettei ole tyhjiä arvoja

    if(empty($user)) {
        throw new Exception("Tyhjää arvoa ei voida laittaa");
    }

    try{
        $pdo = getPdoConnection();
        $sql = "insert into users (username) values (?)";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(1, $user);

        $statement->execute();

        echo "Käyttäjä".$user." on lisätty tietokantaan";
    } catch (PDOException $e) {
        throw $e;
    }
}