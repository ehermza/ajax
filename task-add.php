<?php
    include('database.php');
    $nombre = "";
    $descrip= "";
    if(isset($_POST['name'])== false) {
        die("". mysqli_error($conection));
    }
    $nombre = $_POST['name'];
    $descrip= $_POST['description'];

    $query = "INSERT INTO task (name, description) VALUES ('{$nombre}','{$descrip}')";
    // echo $query;
    // return;
    $resul = mysqli_query($conection, $query);
    if(empty($resul)) {
        die("I have problems to try save new data.");
    }

    echo "New Dates are save succesfully!";
?>