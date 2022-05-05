<?php
    include TEMPLATES_DIR.'head.php' ;

    if(isset($_SESSION["username"])){
        echo "<h1>Welcome ".$_SESSION["username"]."</h1>";
    }else{
        echo "<h1>Welcome! You may log in to use advanced features!</h1>";
    }

    include TEMPLATES_DIR.'foot.php';