<?php

include TEMPLATES_DIR.'head.php';
include MODULES_DIR.'login.php';

    $username = filter_input(INPUT_POST, "username");
    $password = filter_input(INPUT_POST, "PASSWORD");

        if(!isset($_SESSION["username"]) && isset($username)){

            try {
                login($username, $password);
                header("Location: index.php");
                exit;
            } catch (Exception $e) {
                echo '<div class="alert alert-danger" role="alert">'.$e->getMessage().'</div>';
            }
           
        }
        
            if(!isset($_SESSION["username"])){
?>

<form action="login.php" method="post">
    <label for="username">Käyttäjä:</label><br>
    <input type="text" name="username" id="username"><br>
    <label for="PASSWORD">Salasana:</label><br>
    <input type="password" name="PASSWORD" id="PASSWORD"><br>
    <input type="submit" class="btn btn-primary" value="Kirjaudu sisään">
 </form>

<?php } include TEMPLATES_DIR.'foot.php'; ?>