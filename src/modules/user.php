<?php

function getUser(){
    require_once MODULES_DIR.'db.php';

    try{
        $pdo = getPdoConnection();
        
        $sql = "SELECT * FROM users";
        
        $username = $pdo->query($sql);

        return $username->fetchAll();
    }catch(PDOException $e){
        throw $e;
    }
}

function addUser($username, $password){
    require_once MODULES_DIR.'db.php';


    //tarkistetaan onko muuttujia asetettu

    if( !isset($username) || !isset($password) ){
        throw new Exception("Käyttäjää ei voida lisätä koska arvoja puuttuu!");
    }

    //tarkistetaan ettei ole tyhjiä arvoja

    if(empty($username) || empty($password)) {
        throw new Exception("Tyhjää arvoa ei voida laittaa");
    }

    try{
        $pdo = getPdoConnection();
        $sql = "insert into users (username, password) values (?, ?)";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(1, $username);
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $statement->bindParam(2, $hash_password);
        $statement->execute();

        echo "Käyttäjä".$username." on lisätty tietokantaan";
    } catch (PDOException $e) {
        throw $e;
    }
}