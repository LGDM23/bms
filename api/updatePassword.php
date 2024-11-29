<?php
include 'database.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $match = $_POST['match'] ?? '';
    $password = md5($_POST['npass']) ?? '';
    $type = $_POST['type'] ?? '';

    if (empty($match) || empty($password)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid Data.']);
        exit;
    }

    if($type == "phone") {
        $query = "UPDATE users SET password = ? WHERE phone = ?";
    } else {
        $query = "UPDATE users SET password = ? WHERE email = ?";
    }

    if ($stmt = $con->prepare($query)) {
        $stmt->bind_param("ss", $password, $match);
    
        if ($stmt->execute()) {
            if ($stmt->affected_rows !== -1) {
                echo json_encode([
                    'status' => 'success',
                    'redirect' => 'SignIn.php',
                ]);
            } else {
                echo json_encode(['status' => 'error', 'message' => "Account not found"]);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Database query failed']);
        }
    
        $stmt->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Database query preparation failed']);
    }

} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
?>
