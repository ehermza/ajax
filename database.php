<?php
    $conection = mysqli_connect
    (
        "localhost",
        "admin",
        "admin",
        "tasks-database"
    );

    if($conection) {
        // echo "La base datos esta conectada\n";
    }
?>