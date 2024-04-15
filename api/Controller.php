<?php

require '../vendor/autoload.php';

class Controller {
    public static function addTask($taskDetails){
        $host = '127.0.0.1:8889';
        $db = 'my_database';
        $user = 'root';
        $password = 'root';
        $taskDetails = json_decode($taskDetails, true);
        

        try {
            $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare('INSERT INTO tasks (title, due_date) VALUES (:title, :due)');
            $stmt->bindParam(':title', $taskDetails['title']);
            $stmt->bindParam(':due', $taskDetails['due']);
            $stmt->execute();
            echo 'Success';
        } catch (PDOException $e){
            echo 'Failed to connect to DB' . $e->getMessage();
        }finally {
            $conn = null;
        }
    }
}