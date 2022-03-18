<?php 

class Libro {

    // Columns
    public $id;
    public $nombre;
    public $descripcion;


   


function __construct($id,$nombre,$descripcion)
{
   $this->id=$id;
   $this->nombre=$nombre;
   $this->descripcion=$descripcion; 
}

function getId(){
   return $this->id;
}

function getNombre(){
   return $this->nombre;
}




function getDescripcion(){
    return $this->descripcion;
}


       


}

?>