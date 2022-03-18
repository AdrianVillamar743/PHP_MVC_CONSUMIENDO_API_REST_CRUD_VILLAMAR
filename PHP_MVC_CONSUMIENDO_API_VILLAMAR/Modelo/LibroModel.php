<?php

   require 'Libro.php';


   class LibroModel  {
       public $error="";
     

      /*Aqui colocaremos todos los metodos 
      public function getLibros(){
        $str_data=file_get_contents("http://localhost/proyectos/API_PRACTICANDO_SIMPLE/api/read.php");
        $data= json_decode($str_data,true);
        return $data;
     }*/

     

       function getLibrosPrueba(){
        $str_data=file_get_contents("http://localhost/proyectos/API_PRACTICANDO_SIMPLE/api/read.php");
        $data= json_decode($str_data,true);
        $r=array();
        foreach ($data['body'] as $valor => $libro) {
            $libro=new Libro($libro['id'],$libro['nombre'],$libro['descripcion']);
            $r[]=$libro;
        }
        return $r;
     }




     function insertarLibro($librojsonrecibido){
       try {
        $url='http://localhost/proyectos/API_PRACTICANDO_SIMPLE/api/create.php';
        //create a new cURL resource
        $ch = curl_init($url);

        $librojsontratado=json_encode($librojsonrecibido);
        //attach encoded JSON string to the POST fields
        curl_setopt($ch, CURLOPT_POSTFIELDS, $librojsontratado);
        //set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        //return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //execute the POST request
        $result = curl_exec($ch);
        //close cURL resource
       } catch(Exception $ex){
        return $ex;
       } finally{
        curl_close($ch);
       }
        }


        function actualizarLibro($librojsonrecibido){
            try {
             $url='http://localhost/proyectos/API_PRACTICANDO_SIMPLE/api/update.php';
             //create a new cURL resource
             $ch = curl_init($url);
     
             $librojsontratado=json_encode($librojsonrecibido);
             //attach encoded JSON string to the POST fields
             curl_setopt($ch, CURLOPT_POSTFIELDS, $librojsontratado);
             //set the content type to application/json
             curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
             //return response instead of outputting
             curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
             //execute the POST request
             $result = curl_exec($ch);
             //close cURL resource
            } catch(Exception $ex){
             return $ex;
            } finally{
             curl_close($ch);
            }
             }



             function borrarLibro($librojsonrecibido){
                try {
                 $url='http://localhost/proyectos/API_PRACTICANDO_SIMPLE/api/delete.php';
                 //create a new cURL resource
                 $ch = curl_init($url);
         
                 $librojsontratado=json_encode($librojsonrecibido);
                 //attach encoded JSON string to the POST fields
                 curl_setopt($ch, CURLOPT_POSTFIELDS, $librojsontratado);
                 //set the content type to application/json
                 curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
                 //return response instead of outputting
                 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                 //execute the POST request
                 $result = curl_exec($ch);
                 //close cURL resource
                } catch(Exception $ex){
                 return $ex;
                } finally{
                 curl_close($ch);
                }
                 }

/*
    



  


    function modificarEmpleado($e){
        try {
            $para=$this->con->prepare(
                "update empleado set nombre=?,id_dep=? where id_emp=?"
            );
            $para->bind_param('sss',$a,$b,$c);  
            $a=$e->getNombre();
            $b=$e->getId_Dep();
            $c=$e->getId_emp();
            $para->execute();
        }catch(Exception $ex){
                   return $ex;
               }finally{
                 $para->close();
               }

    }


function eliminarEmpleado($e){
    try {
        $para=$this->con->prepare("delete from empleado where id_emp=?");
        $para->bind_param('s',$a);
        $a=$e->getId_emp();
        $para->execute();
    } catch (Exception $ex) {
       return $ex;
    }finally{
        $para->close();
    }
}






*/
   }
?>