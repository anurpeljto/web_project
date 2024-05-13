<?php

require_once __DIR__ . '/../dao/TaskDAO.php';

class TaskService {
    private $taskDAO;

    public function __construct(){
        $this->taskDAO = new TaskDAO();
    }

    public function addTask($taskDetails){
        return $this->taskDAO->addTask($taskDetails);
    }

    public function getTasks(){
        return $this->taskDAO->getTasks();
    }

    public function getUpcoming(){
        return $this->taskDAO->getUpcoming();
    }

    public function markDone($task_id){
        return $this->taskDAO->markDone($task_id);
    }
}
