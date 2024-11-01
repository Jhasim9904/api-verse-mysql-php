<?php
// get_apis.php
header('Content-Type: application/json');
include 'db_config.php'; // Ensure this path is correct

// Check if the connection is established
if (!$conn) {
    echo json_encode(['error' => 'Database connection failed.']);
    exit();
}

try {
    $stmt = $conn->prepare("SELECT * FROM apis");
    $stmt->execute();
    $result = $stmt->get_result();
    $apis = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($apis);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}

$conn->close();
?>
