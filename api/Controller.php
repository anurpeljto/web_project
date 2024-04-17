<?php

require '../vendor/autoload.php';
require_once 'DB_connector.php';


class Controller {
    private static $connector;

    public function __construct(){
        self::$connector = new Connector();
    }

    public static function addTask($taskDetails){
        $taskDetails = json_decode($taskDetails, true);
        

        try {
            $conn = self::$connector->connect();
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
                    echo 'Success';
                    return true;
                } else {
                    echo 'Wrong password';
                    return false;
                }
            } else{
                return false;
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
                return true;
            }
        } catch (PDOException $e){
            echo 'Error: ' . $e->getMessage();
        }

    }
}