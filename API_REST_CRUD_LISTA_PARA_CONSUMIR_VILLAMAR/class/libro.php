<?php
    class Libro{
        // Connection
        private $conn;
        // Table
        private $db_table = "libro";
        // Columns
        public $id;
        public $nombre;
        public $descripcion;
        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }
        // GET ALL
        public function getLibros(){
            $sqlQuery = "SELECT *FROM " . $this->db_table . " order by id desc";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }
        // CREATE
        public function crearLibros(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        nombre= :nombre, 
                        descripcion = :descripcion
                       ";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->nombre=htmlspecialchars(strip_tags($this->nombre));
            $this->descripcion=htmlspecialchars(strip_tags($this->descripcion));

        
            // bind data
            $stmt->bindParam(":nombre", $this->nombre);
            $stmt->bindParam(":descripcion", $this->descripcion);

        
            if($stmt->execute()){
               return true;
            }
            return false;
        }


        // READ single
        public function getunLibro(){
            $sqlQuery = "SELECT
                        nombre,descripcion
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       id = :id
                    ";
            $stmt = $this->conn->prepare($sqlQuery);
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(":id", $this->id);
            $stmt->execute();
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->nombre = $dataRow['nombre'];
            $this->descripcion = $dataRow['descripcion'];
        }        

       



        // UPDATE
        public function updateLibro(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        nombre = :nombre, 
                        descripcion = :descripcion 

                    WHERE 
                        id = :id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->nombre=htmlspecialchars(strip_tags($this->nombre));
            $this->descripcion=htmlspecialchars(strip_tags($this->descripcion));
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            // bind data
            $stmt->bindParam(":nombre", $this->nombre);
            $stmt->bindParam(":descripcion", $this->descripcion);
            $stmt->bindParam(":id", $this->id);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        // DELETE
        function deleteLibro(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = :id";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(":id", $this->id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }
    }
?>