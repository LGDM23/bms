<?php
include 'database.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $match = $_POST['match'] ?? '';
    $otp = $_POST['otp'] ?? '';
    $type = $_POST['type'] ?? '';

    if (empty($match) || empty($otp)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid Data.']);
        exit;
    }

    if($type == "phone") {
        $query = "SELECT * FROM users WHERE phone = ? AND otp = ?";
    } else {
        $query = "SELECT * FROM users WHERE email = ? AND otp = ?";
    }


    if ($stmt = $con->prepare($query)) {
        $stmt->bind_param("ss", $match, $otp);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            echo json_encode([
                'status' => 'success',
                'redirect' => 'create_password.php',
            ]);

        } else {
            echo json_encode(['status' => 'error', 'message' => "Invalid Code"]);
        }

        $stmt->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Database query failed']);
    }

} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
?>
