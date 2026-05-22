<?php

function getDatabaseConnection() {

    $host = "my-3tier-database.cjm8woaokobh.ap-south-2.rds.amazonaws.com";
    $user = "admin";
    $password = "7288023036";
    $database = "messagesdb";

    try {
        $conn = new PDO(
            "mysql:host=$host;dbname=$database",
            $user,
            $password
        );

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;

    } catch(PDOException $e) {

        echo json_encode([
            "success" => false,
            "error" => "Database error: " . $e->getMessage()
        ]);

        exit;
    }
}

?>
