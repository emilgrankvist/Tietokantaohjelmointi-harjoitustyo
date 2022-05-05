<?php
    include TEMPLATES_DIR.'head.php' ;

    if(isset($_SESSION["username"])){
        echo "<h1>Tervetuloa ".$_SESSION["username"]."</h1>";
    }else{
        echo "<h1>Tervetuloa muukalainen kirjauduthan sisään :)!</h1>";
    }

    include TEMPLATES_DIR.'foot.php';