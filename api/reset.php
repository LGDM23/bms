<?php
include 'database.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $birthday = $_POST['birthday'] ?? '';

    if (empty($username) || empty($birthday)) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
        exit;
    }

    $query = "SELECT phone, email FROM users WHERE username = ? AND birthday = ?";

    if ($stmt = $con->prepare($query)) {
        $stmt->bind_param("ss", $username, $birthday);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            $phone = $user['phone'];
            $email = $user['email'];

            echo json_encode([
                'status' => 'success',
                'redirect' => 'get_otp.php',
                'phone' => $phone,
                'email' => $email
            ]);
        } else {
            echo json_encode(['status' => 'error', 'message' => "Information doesn't match our records"]);
        }

        $stmt->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Database query failed']);
    }

} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
?>
