<?php
    include('database.php');

    $search = $_POST['buscar'];

    if(empty($search)) {
        die('search: VACIO!');
    }
    
    $strquery = "SELECT * FROM task WHERE name LIKE '{$search}%'";
    // echo $strquery;
    // die();
    $result = mysqli_query($conection, $strquery);
    if(!$result) {
        die('ERROR MYSQL: SELECT');
    }
    $json = array();
    while($fila = mysqli_fetch_array($result)) {

        $json[] = array(
            'name' => $fila['name'],
            'description' => $fila['description'],
            'id' => $fila['id']            
        );
    }
    // $json[] = array(
    //     'name'=>'EZEQUIEL',
    //     'description'=>'HER',
    //     'id'=> strval(random_int(0,100))
    // );
    $json_string = json_encode($json);
    echo $json_string;
?>