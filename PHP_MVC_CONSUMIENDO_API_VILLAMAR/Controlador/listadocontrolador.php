<?php

require('Modelo/LibroModel.php');
$error="";
$data= new LibroModel();


if (isset($_REQUEST["insertar"])) {
    # code...
    $e=new Libro($_REQUEST["id"],$_REQUEST["nombre"],$_REQUEST["descripcion"]);
     $error=$data->insertarLibro($e);
}


if (isset($_REQUEST["modificar"])) {
    # code...
    $e=new Libro($_REQUEST["id"],$_REQUEST["nombre"],$_REQUEST["descripcion"]);
     $error=$data->actualizarLibro($e);
}


if (isset($_REQUEST["eliminar"])) {
    # code...
    $e=new Libro($_REQUEST["id"],$_REQUEST["nombre"],$_REQUEST["descripcion"]);
    $error=$data->borrarLibro($e);
}

$librodevuelto=$data->getLibrosPrueba();
require ('Vistas/listado.php');




?>