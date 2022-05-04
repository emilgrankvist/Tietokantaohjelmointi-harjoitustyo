<?php

include TEMPLATES_DIR.'head.php';
include MODULES_DIR.'user.php';

    $username = filter_input(INPUT_POST, "username");
    $password = filter_input(INPUT_POST, "password");

    if(isset($username, $password)) {
        try {
            addUser($username, $password);
            echo '<div class="alert alert-success" role="alert">Käyttäjä lisätty!</div>';
        }catch (Exception $e) {
            echo '<div class="alert alert-danger" role="alert">'.$e->getMessage().'</div>';
        }
    }

?>

<form action="user.php" method="post">
    <label for="username">Käyttäjä:</label><br>
    <input type="text" name="username" id="username"><br>
    <label for="username">Salasana:</label><br>
    <input type="password" name="password" id="password"><br>
    <input type="submit" class="btn btn-primary" value="Lisää käyttäjä">
 </form>

<?php include TEMPLATES_DIR.'foot.php'; ?>