<?php

require_once __DIR__.'/../dao/UserDAO.php';

class UserService {
    private $userDAO;

    public function __construct(){
        $this->userDAO = new UserDAO();
    }

    public function login($userDetails){
        return $this->userDAO->login($userDetails);
    }

    public function register($userDetails){
        return $this->userDAO->register($userDetails);
    }

    public function getUserDetails($token){
        return $this->userDAO->getUserDetails($token);
    }

    public function changeDetails($newDetails){
        return $this->userDAO->changeDetails($newDetails);
    }
}
