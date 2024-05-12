<?php

require_once 'BaseDAO.php';
require '../../vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;


class UserDAO extends BaseDAO {
    public function __construct(){
        parent::__construct();
    }
    
    public function login($userDetails){
        try {
            $userDetails = json_decode($userDetails, true);
            $conn = self::$connector->connect();
            $stmt = $conn->prepare('SELECT * FROM users WHERE email = :email');
            $stmt->bindParam(':email', $userDetails['email']);
            $stmt->execute(); 
            $user = $stmt->fetch();

            if($user){
                if (password_verify($userDetails['password'], $user['password'])){
                    $token = JWT::encode(['user_id' => $user['user_id']], JWT_SECRET, 'HS256');
                    return $token;
                }
            } else{
                return false;
            }
        } catch (PDOException $e){
            return false;
        }
    }

    public function register($userDetails){
        try {
            $userDetails = json_decode($userDetails, true);
            $conn = self::$connector->connect();
            $check = $conn->prepare('SELECT * FROM users WHERE email = :email');
            $email = $userDetails['email'];
            $check->bindParam(':email', $email);
            $check->execute();

            $account = $check->fetch();
            if ($account){
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
            return false;
        }
    }

    public function getUserDetails($token){
        try {
            $decoded = JWT::decode($token, new Key(JWT_SECRET, 'HS256'));
            $user_id = $decoded->user_id;
            $conn = self::$connector->connect();
            $stmt = $conn->prepare('SELECT user_id, first_name, last_name FROM users WHERE user_id = :user_id'); 
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();
            $userDetails = $stmt->fetch(PDO::FETCH_ASSOC);

            if($userDetails){
                return $userDetails;
            } else {
                return [];
            }
        } catch (PDOException $e){
            return [];
        }
    }

    public function changeDetails($token, $newDetails){
        try {
            $decoded = JWT::decode($token, JWT_SECRET, 'HS256');
            $user_id = $decoded->user_id;
            $data = json_decode($newDetails, true);
            $conn = self::$connector->connect();
            $query = $conn->prepare('UPDATE users SET first_name = :first_name, last_name = :last_name, phone_number = :phone_number, address = :address WHERE user_id = :user_id');
            $query->bindParam(':first_name', $data['first_name']);
            $query->bindParam(':last_name', $data['last_name']);
            $query->bindParam(':phone_number', $data['phone_number']);
            $query->bindParam(':address', $data['address']);
            $query->bindParam(':user_id', $user_id);
            $query->execute();

            return true;
        } catch (PDOException $e){
            return false;
        } 
    }
}
