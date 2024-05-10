<?php 

require 'config.php';

class Connector {
    
    private $conn;

    public function connect(){
        try {
            $this->conn = new PDO("mysql:host=127.0.0.1;port=8889;dbname=my_database", 'root', 'root');
        
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e){
            echo 'Error ' . $e->getMessage();
        }
    }
}

