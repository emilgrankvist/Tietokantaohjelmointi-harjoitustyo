<?php

include TEMPLATES_DIR.'head.php';
include MODULES_DIR.'exercise.php';

$Log = filter_input(INPUT_GET, "ID");

if(isset($Log)) {
    try{
        deleteListaLog($Log);
        echo '<div class="alert alert-success" role="alert">Harjoitus poistettu!</div>';
    } catch (Exception $e){
        echo '<div class="alert alert-danger" role="alert">'.$e->getMessage().'</div>';
    }
}

$list = Reenilista();

// Print exercise list
echo "<h3> Koko reenilista <h3>"
."<br>"
."<table>".

    "<tr>".
        "<td>".' Toistot '."&nbsp;"."</td>".
        "<td>".' Paino (kg) '."&nbsp;"."</td>".
        "<td>".' Nimi '."&nbsp;"."</td>".
        "<td>".' Reeni '."&nbsp;"."</td>".
    "</tr>";

    foreach ($list as $x)
    {
        echo 

        "<tr>".
            "<td>".$x["reps"]."</td>".
            "<td>".$x["weight"]."</td>".
            "<td>".$x["username"]."</td>".
            "<td>".$x["ExerciseType"]."</td>".
            "<td>".'<a href=reenilista.php?id='.$x["ID"].'"type="button" class="btn btn-danger">Poista</a> </td>'. 
            "<td>".'<a href=muokkaus.php?id='.$x["ID"].'"type="button" class="btn btn-success">Muokkaa</a> </td>'.     
        "</tr>";
    }
    
    echo '<style>
    a { 
        padding: 20px; 
    } 
    </style>'.
    "</table>";

?>

<?php include TEMPLATES_DIR.'foot.php'; ?>
    