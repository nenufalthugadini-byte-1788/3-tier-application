<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}
require_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        "success" => false,
        "error" => "Invalid request method"
    ]);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['message']) || empty($data['message'])) {
    echo json_encode([
        "success" => false,
        "error" => "Message is required"
    ]);
    exit;
}

$message = $data['message'];

try {

    $conn = getDatabaseConnection();

    $stmt = $conn->prepare("INSERT INTO messages (message) VALUES (:message)");

    $stmt->bindParam(':message', $message);

    $stmt->execute();

    echo json_encode([
        "success" => true,
        "message" => "Message saved successfully"
    ]);

} catch(PDOException $e) {

    echo json_encode([
        "success" => false,
        "error" => $e->getMessage()
    ]);
}

?>
