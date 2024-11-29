<?php

include('database.php');
header('Content-Type: application/json');

function returnError($message) {
    echo json_encode(['error' => $message]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $identifier = $_POST['gg'] ?? '';

    if (empty($identifier)) {
        returnError('Invalid Identifier');
    }

    $sql2 = "DELETE FROM user_profile WHERE identifier = ?";

    if ($stmt2 = $con->prepare($sql2)) {
        $stmt2->bind_param("s", $identifier);

        if ($stmt2->execute()) {

            $sql = "DELETE FROM users WHERE identifier = ?";

            if ($stmt = $con->prepare($sql)) {
                $stmt->bind_param("s", $identifier);

                if ($stmt->execute()) {
                    echo json_encode(['success' => 'Account deleted successfully.']);
                } else {
                    returnError('Failed to delete user account: ' . $stmt->error);
                }

                $stmt->close();
            } else {
                returnError('Failed to prepare user deletion statement: ' . $con->error);
            }

        } else {
            returnError('Failed to delete user profile: ' . $stmt2->error);
        }

        $stmt2->close();
    } else {
        returnError('Failed to prepare user profile deletion statement: ' . $con->error);
    }

    $con->close();
}
?>
