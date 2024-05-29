<?php
$db_host = $_POST['db_host'] ?? '';
$db_username = $_POST['db_username'] ?? '';
$db_password = $_POST['db_password'] ?? '';
$db_name = $_POST['db_name'] ?? '';
$response = [];
try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
    $success = true;
} catch (PDOException $e) {
    $response["msg"] = $e->getMessage();
    $success = false;
}
echo json_encode(["success" => $success, "response" => $response]);