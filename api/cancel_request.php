<?php
include 'database.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $request_id = $_POST['id'] ?? '';

    if (empty($request_id)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid Request ID.']);
        exit;
    }

    $query = "UPDATE requests SET status = 'CANCELLED' WHERE request_code = ?";
    
    if ($stmt = $con->prepare($query)) {
        $stmt->bind_param("s", $request_id);
    
        if ($stmt->execute()) {
            if ($stmt->affected_rows !== -1) {
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Document request rejected.',
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
