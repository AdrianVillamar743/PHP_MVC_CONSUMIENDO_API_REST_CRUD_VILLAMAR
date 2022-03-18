<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../config/database.php';
    include_once '../class/libro.php';
    $database = new Database();
    $db = $database->getConnection();
    $items = new Libro($db);
    $stmt = $items->getLibros();
 
    
    $itemCount = $stmt->rowCount();

  
    if($itemCount > 0){
        

            $LibroArr = array();
            
            $LibroArr["body"] = array();
           
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                $e = array('id'=> $id, 'nombre'=> $nombre,'descripcion'=>$descripcion);
                array_push($LibroArr["body"], $e);
            }
    
             
        
        echo json_encode($LibroArr);
    }
    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
?>