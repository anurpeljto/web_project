<?php 

require 'config.php';

class Connector {
    
    private $conn;

    public function connect(){
        try {
            $this->conn = new PDO("mysql:host=".host.";port=".port.";dbname=".db."", user, password);
        
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e){
            echo 'Error ' . $e->getMessage();
        }
    }
}

