<?php

function login ($username, $password){
    require('db.php');

    

    if(isset($username) || !isset($password) ){
        echo "Tietoja puuttui";
    }

    if( empty($username) || empty($password) ){
        echo "Täytäthän kentät";
        
    }

    try {
        $pdo = getPdoConnection();
        $sql = "select * from users where username=?";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(1, $username);

        $statement->execute();

        if($statement->rowCount() <=0){
            throw new Exception("Käyttäjää ei löytynyt");
           
        }
        $row = $statement->fetch();

        if(!password_verify($password, $row["password"] )) {
            throw new Exception("Käyttäjätunnus tai salasana väärin.");
        }
                
         $_SESSION["username"] = $username;
         
 
     }catch(PDOException $e){
         throw $e;
     }
 
    }

    function logout() {
        try {
            session_unset();
            session_destroy();
        } catch(Exception $e){
            throw $e;
        }
    }