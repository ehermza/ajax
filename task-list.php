<?php
    include('database.php');

    // $search = $_POST['buscar'];

    // if(empty($search)) {
    //     die('search: VACIO!');
    // }
    
    $strquery = "SELECT * FROM task WHERE 1";
    // echo $strquery;
    // die();
    $result = mysqli_query($conection, $strquery);
    if(!$result) {
        die('ERROR MYSQL: '. $strquery);
    }
    $json = array();
    while($fila = mysqli_fetch_array($result)) {

        $json[] = array(
            'name' => $fila['name'],
            'description' => $fila['description'],
            'id' => $fila['id']            
        );
    }

    $json_string = json_encode($json);
    echo $json_string;
?>