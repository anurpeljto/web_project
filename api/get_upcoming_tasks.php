<?php 

require_once 'DB_connector.php';

try {
    $database = new Connector();
    $conn = $database->connect();
    $stmt = $conn->prepare('SELECT * FROM tasks WHERE due_date > CURDATE() ORDER BY due_date LIMIT 5;');
    $stmt->execute();

    $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(['tasks'=>$tasks]);
} catch (PDOException $e){
    echo 'Failed to connect to DB, ' . $e->getMessage();
}
finally {
    $conn = null;
}