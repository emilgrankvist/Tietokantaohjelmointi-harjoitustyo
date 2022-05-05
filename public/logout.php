<?php
    include TEMPLATES_DIR.'head.php';
    include MODULES_DIR.'login.php';

    if(isset($_SESSION["username"])){
        logout();
        header("Location: logout.php");
    }else{
        echo '<div class="alert alert-success" role="alert">Kirjattu ulos onnistuneesti</div>';
    }

    include TEMPLATES_DIR.'foot.php.';