<?php 


class Connector {
    private $host = '127.0.0.1:8889';
    private $db = 'my_database';
    private $user = 'root';
    private $password = 'root';
    private $conn;

    public function connect(){
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->password);
        
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e){
            echo 'Error ' . $e->getMessage();
        }
    }
}

