<?php

require_once 'BaseDAO.php';

class TaskDAO extends BaseDAO {
    public function __construct(){
        parent::__construct();
    }
    
    public function addTask($taskDetails, $user_id){
        try {
            $taskDetails = json_decode($taskDetails, true);
            $conn = self::$connector->connect();
            $stmt = $conn->prepare('INSERT INTO tasks (title, due_date, user_id) VALUES (:title, :due, :user_id)');
            $stmt->bindParam(':title', $taskDetails['title']);
            $stmt->bindParam(':due', $taskDetails['due']);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();
            return true;
        } catch (PDOException $e){
            return false;
        }
    }

    public function getTasks($user_id){
        try {
            $conn = self::$connector->connect();
            $stmt = $conn->prepare('SELECT * FROM tasks WHERE user_id = :user_id');
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e){
            return [];
        }
    }

    public function getUpcoming($user_id){
        try {
            $conn = self::$connector->connect();
            $stmt = $conn->prepare('SELECT * FROM tasks WHERE due_date >= CURDATE() AND user_id = :user_id ORDER BY due_date LIMIT 5;');
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e){
            return [];
        }
    }

    public function markDone($user_id, $task_id){
        try {
            $conn = self::$connector->connect();
            $stmt = $conn->prepare('DELETE FROM tasks WHERE ID = :task_id AND user_id = :user_id');
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':task_id', $task_id);
            $stmt->execute();
            return true;
        } catch (PDOException $e){
            return false;
        }
    }
}
