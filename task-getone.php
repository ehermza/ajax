<?php
    include('database.php');

    $search = $_POST['idtask'];

    if(empty($search)) {
        die('search: VACIO!');
    }
    
    $strquery = "SELECT * FROM task WHERE id = '{$search}'";
    // echo $strquery;
    // die();
    $result = mysqli_query($conection, $strquery);
    if(!$result) {
        die('ERROR MYSQL: SELECT');
    }
    $json = null;
    while($fila = mysqli_fetch_array($result)) {

        $json = array(
            'name' => $fila['name'],
            'description' => $fila['description'],
            'id' => $fila['id']            
        );
    }
    $json_string = json_encode($json);
    echo $json_string;
?>