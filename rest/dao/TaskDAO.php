<?php

require_once 'BaseDAO.php';
require '../../vndr/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class TaskDAO extends BaseDAO {
    public function __construct(){
        parent::__construct();
    }
    
    public function addTask($taskDetails){
        try {
            $token = Flight::request()->getHeader('Token');
            if(!$token){
                Flight::halt(404, 'No auth token');
            }
            $decoded = JWT::decode($token, new Key(JWT_SECRET, 'HS256'));
            $user_id = $decoded->user_id;
            
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

    public function getTasks(){
        try {
            $token = Flight::request()->getHeader('Token');
            if(!$token){
                Flight::halt(404, 'No auth token');
            }
            $decoded = JWT::decode($token, new Key(JWT_SECRET, 'HS256'));
            $user_id = $decoded->user_id;
            $conn = self::$connector->connect();
            $stmt = $conn->prepare('SELECT * FROM tasks WHERE user_id = :user_id');
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();
            Flight::json(["tasks" => $stmt->fetchAll(PDO::FETCH_ASSOC)]);
        } catch (PDOException $e){
            return [];
        }
    }

    public function getUpcoming(){
        try {
            $token = Flight::request()->getHeader('Token');
            // if(!$token){
            //     Flight::halt(404, 'No auth token');
            // }
            $decoded = JWT::decode($token, new Key(JWT_SECRET, 'HS256'));
            $user_id = $decoded->user_id;
            $conn = self::$connector->connect();
            $stmt = $conn->prepare('SELECT * FROM tasks WHERE due_date >= CURDATE() AND user_id = :user_id ORDER BY due_date LIMIT 5;');
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();
            Flight::json(["upcoming" => $stmt->fetchAll(PDO::FETCH_ASSOC)]);
        } catch (PDOException $e){
            return false;
        }
    }

    public function markDone($task_id){
        try {
            $token = Flight::request()->getHeader('Token');
            if(!$token){
                Flight::halt(404, 'No auth token');
            }
            $decoded = JWT::decode($token, new Key(JWT_SECRET, 'HS256'));
            $user_id = $decoded->user_id;
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
