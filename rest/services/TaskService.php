<?php

require_once __DIR__ . '/../dao/TaskDAO.php';

class TaskService {
    private $taskDAO;

    public function __construct(){
        $this->taskDAO = new TaskDAO();
    }

    public function addTask($taskDetails, $user_id){
        return $this->taskDAO->addTask($taskDetails, $user_id);
    }

    public function getTasks($user_id){
        return $this->taskDAO->getTasks($user_id);
    }

    public function getUpcoming($user_id){
        return $this->taskDAO->getUpcoming($user_id);
    }

    public function markDone($user_id, $task_id){
        return $this->taskDAO->markDone($user_id, $task_id);
    }
}
