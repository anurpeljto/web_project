<?php 

require_once 'DB_connector.php';

try {
    $database = new Connector();
    $conn = $database->connect();
    $stmt = $conn->prepare('SELECT * FROM tasks');
    $stmt->execute();

    $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(['tasks'=>$tasks]);
} catch (PDOException $e){
    echo 'Failed to connect to DB, ' . $e;
}
finally {
    $conn = null;
}