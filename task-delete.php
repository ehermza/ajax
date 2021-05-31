<?php
    include('database.php');

    if(!isset($_POST['idtask'])) {
        die("Can't get value id from POST");
    }
    $idt = $_POST['idtask'];
    
    $query = "DELETE FROM task WHERE id = '{$idt}'";
    $result= mysqli_query($conection, $query);
    if (!$result) 
    {
        die("Error to try DELETE id: {$idtask}");
    }
    echo "Task nro. {$idquery} deleted sucesfully!";
?>