<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    include_once '../config/database.php';
    include_once '../class/libro.php';
    $database = new Database();
    $db = $database->getConnection();
    $item = new Libro($db);
    $data = json_decode(file_get_contents("php://input"));
    $item->nombre = $data->nombre;
    $item->descripcion = $data->descripcion;

    
    if($item->crearLibros()){
        echo 'Libro creado.';
    } else{
        echo 'Libro no pudo ser creado';
    }
?>