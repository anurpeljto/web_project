<?php

require '../vendor/autoload.php';
require_once 'DB_connector.php';


class Controller {
    private static $connector;

    public function __construct(){
        self::$connector = new Connector();
    }

    public static function addTask($taskDetails, $user_id){
        $taskDetails = json_decode($taskDetails, true);
        

        try {
            $conn = self::$connector->connect();
            $stmt = $conn->prepare('INSERT INTO tasks (title, due_date, user_id) VALUES (:title, :due, :user_id)');
            $stmt->bindParam(':title', $taskDetails['title']);
            $stmt->bindParam(':due', $taskDetails['due']);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();
            echo 'Success';
        } catch (PDOException $e){
            echo 'Failed to connect to DB' . $e->getMessage();
        }finally {
            $conn = null;
        }
    }

    public static function login($userDetails){
        $userDetails = json_decode($userDetails, true);

        try {
            $conn = self::$connector->connect();
            $stmt = $conn->prepare('SELECT * FROM users WHERE email = :email');
            $stmt->bindParam(':email', $userDetails['email']);
            $stmt->execute(); 
            $user = $stmt->fetch();

            if($user){
                if (password_verify($userDetails['password'], $user['password'])){
                    return true;
                }
            } else{
                echo false;
            }
        } catch (PDOException $e){
            echo 'Error: ' . $e->getMessage();
        }
    }

    public static function register($userDetails){
        $userDetails = json_decode($userDetails, true);

        try {
            $conn = self::$connector->connect();
            $check = $conn->prepare('SELECT * FROM users WHERE email = :email');
            $email = $userDetails['email'];
            $check->bindParam(':email', $email);
            $check->execute();

            $account = $check->fetch();
            if ($account){
                // acc exists!
                return false; 
            } else {
                $insert = $conn->prepare('INSERT INTO users (email, password, first_name, last_name) VALUES (:email, :password, :first_name, :last_name)');
                $email = $userDetails['email'];
                $first_name = $userDetails['first_name'];
                $last_name = $userDetails['last_name'];
                $password = password_hash($userDetails['password'], PASSWORD_BCRYPT);

                $insert->bindParam(':email', $email);
                $insert->bindParam(':password', $password);
                $insert->bindParam(':first_name', $first_name);
                $insert->bindParam(':last_name', $last_name);
                $insert->execute();
                return json_encode(["success" => true]);
            }
        } catch (PDOException $e){
            return json_encode(['status' => 'error', 'message' => 'Error: ' . $e->getMessage()]);
        }

    }

    public static function getUserDetails($emailData){
        try {
            $data = json_decode($emailData, true);
            $email = $data["email"];
            $conn = self::$connector->connect();
            $stmt = $conn->prepare('SELECT user_id, first_name, last_name FROM users WHERE email = :email'); // 
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $userDetails = $stmt->fetch(PDO::FETCH_ASSOC);

            if($userDetails){
                $_SESSION['user_details'] = $userDetails;
                $_SESSION['user_id'] = $userDetails['user_id'];
                $_SESSION['first_name'] = $userDetails['first_name'];
                $_SESSION['last_name'] = $userDetails['last_name'];
                $_SESSION['email'] = $email;
                return json_encode(["success" => "true"]);
            } else {
                return json_encode(["error" => "User not found"]);
            }
        } catch (PDOException $e){
            echo 'Error ' . $e->getMessage();
        }
    }

    public static function changeDetails($newDetails){
        $data = json_decode($newDetails, true);
        try {
            $conn = self::$connector->connect();
            $query = $conn->prepare('UPDATE users SET first_name = :first_name, last_name = :last_name, phone_number = :phone_number, address = :address WHERE user_id = :user_id');
            $query->bindParam(':first_name', $data['first_name']);
            $query->bindParam(':last_name', $data['last_name']);
            $query->bindParam(':phone_number', $data['phone_number']);
            $query->bindParam(':address', $data['address']);
            $query->bindParam(':user_id', $_SESSION['user_id']);

            $query->execute();

            if ($query){
                return json_encode(["success" => true]);
            } else {
                return json_encode(["success" => false]);
            }
        } catch (PDOException $e){
            echo $e->getMessage();
        } 


    }

    public static function getTasks($user_id){
        try {
            $database = new Connector();
            $conn = $database->connect();
            $stmt = $conn->prepare('SELECT * FROM tasks WHERE user_id = :user_id');
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();
        
            $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode(['tasks'=>$tasks]);
        } catch (PDOException $e){
            echo 'Failed to connect to DB, ' . $e;
        }
        finally {
            $conn = null;
        }
    }

    public static function getUpcoming($user_id){
        try {
            $database = new Connector();
            $conn = $database->connect();
            $stmt = $conn->prepare('SELECT * FROM tasks WHERE due_date >= CURDATE() AND user_id = :user_id ORDER BY due_date LIMIT 5;');
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();
        
            $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode(['tasks'=>$tasks]);
        } catch (PDOException $e){
            echo 'Failed to connect to DB, ' . $e->getMessage();
        }
        finally {
            $conn = null;
        }
    }
}