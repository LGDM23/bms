<?php
include 'database.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $otp = $_POST['otp'] ?? '';
    $match = $_POST['match'] ?? '';
    $type = $_POST['typez'] ?? '';

    if (empty($otp)) {

        echo json_encode(['status' => 'error', 'message' => 'OTP is Required.']);
        exit;

    }

    if($type == "phone") {
        $query = "SELECT otp FROM users WHERE phone = ?";
    } else {
        $query = "SELECT otp FROM users WHERE email = ?";
    }

    if ($stmt = $con->prepare($query)) {
        $stmt->bind_param("s",  $match);

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
            
            echo json_encode(['status' => 'error', 'message' => "You have entered an invalid code"]);
        }

        $stmt->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Database query failed']);
    }

} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
?>
