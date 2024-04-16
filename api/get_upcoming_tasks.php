<?php 

$host = '127.0.0.1:8889';
$db = 'my_database';
$user = 'root';
$password = 'root';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare('SELECT * FROM tasks ORDER BY due_date LIMIT 5;');
    $stmt->execute();

    $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(['tasks'=>$tasks]);
} catch (PDOException $e){
    echo 'Failed to connect to DB, ' . $e;
}
finally {
    $conn = null;
}