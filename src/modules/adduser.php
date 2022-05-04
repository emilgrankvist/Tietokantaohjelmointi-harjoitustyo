<?php
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