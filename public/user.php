<?php

include TEMPLATES_DIR.'head.php';
include MODULES_DIR.'user.php';

    $user = filter_input(INPUT_POST, "users");

    if(isset($user)) {
        try {
            addUser($user);
            echo '<div class="alert alert-success" role="alert">Käyttäjä lisätty!</div>';
        }catch (Exception $e) {
            echo '<div class="alert alert-danger" role="alert">'.$e->getMessage().'</div>';
        }
    }

?>

<form action="user.php" method="post">
    <label for="user">Käyttäjä:</label><br>
    <input type="text" name="user" id="user"><br>
    <input type="submit" class="btn btn-primary" value="Lisää käyttäjä">
 </form>

<?php include TEMPLATES_DIR.'foot.php'; ?>