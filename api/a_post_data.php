<?php
header('Content-Type: application/json');
session_start();
include('database.php');
include('../scss/dark/assets/apps/sendSMS.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET' || $_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (isset($_GET['action'])) {

        switch ($_GET['action']) {

            case 'getMyRequests':

                $id = $_GET['id'];
                getMyRequests($con, $id);

                break;

            case 'addRequests':

                $id = $_GET['id'];
                $request_docu = $_POST['cert'] ?? null;
                $purpose = $_POST['purpose'] ?? null;

                if (is_null($request_docu)) {
                    echo json_encode(['error' => 'Select Document']);
                    exit;
                }
                if (is_null($purpose)) {
                    echo json_encode(['error' => 'Select Purpose']);
                    exit;
                }

                $request_code = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);
                $request_date = date("m-d-Y");
                $status = 'PENDING';

                addRequest($con, $id, $request_code, $purpose, $status, $request_date, $request_docu);

                break;

            case 'reject':

                $id = $_POST['user_identifier_r'];
                $msg = $_POST['reject_msg'];
                rejectRegistration($con, $id, $msg);

                break;

            case 'approve':

                $id = $_POST['user_identifier'];
                approveRegistration($con, $id);

                break;

            default:
                echo json_encode(['error' => 'Invalid actionz']);
                break;

        }

    } else {

        echo json_encode(['error' => 'No action specified']);

    }

} else {

    echo json_encode(['error' => 'Invalid request method']);

}

$con->close();

function rejectRegistration($con, $id, $msg) {

    $query = "SELECT phone FROM users WHERE identifier = '$id'";
    
    $result = $con->query($query);

    if ($result && $result->num_rows > 0) {
        
        $row = $result->fetch_assoc();
        $phone = $row['phone']; 
        
        sendSMS::send($phone, $msg);

        $query2 = "DELETE from users WHERE identifier = '$id'";
        $result = $con->query($query2);

        echo json_encode(['success' => $phone]);

    } else {
        echo json_encode(['error' => 'reject error']);
    }
}


function approveRegistration($con, $id) {

    $query = "SELECT phone FROM users WHERE identifier = '$id'";

    $msg = "Your Account Regisration in BMS - Barangay Tabuyuc has been APPROVE you may now login to your account.";
    
    $result = $con->query($query);

    if ($result && $result->num_rows > 0) {
        
        $row = $result->fetch_assoc();
        $phone = $row['phone']; 
        
        sendSMS::send($phone, $msg);

        $query2 = "UPDATE users SET active = 1 WHERE identifier = '$id'";
        $result = $con->query($query2);

        echo json_encode(['success' => $phone]);

    } else {

        echo json_encode(['error' => 'approve error']);

    }
}


function getMyRequests($con, $id) {

    $sql = "SELECT r.*, a.lastname, a.middlename, a.firstname 
    FROM requests r 
    JOIN users a ON r.user_id = a.user_id 
    WHERE r.user_id = $id";
    $result = $con->query($sql);

    if ($result && $result->num_rows > 0) {
        $requests = [];
        while ($row = $result->fetch_assoc()) {
            $requests[] = [
                'id' => $row['request_id'],
                'request_code' => $row['request_code'],
                'user_id' => $row['user_id'],
                'purpose' => $row['purpose'],
                'status' => $row['status'],
                'request_date' => $row['request_date'],
                'request_docu' => $row['request_docu'],
                'fullname' => $row['firstname']." ".$row['middlename']." ".$row['lastname'],
            ];
        }
        echo json_encode($requests);
    } else {
        echo json_encode(['error' => 'No Request found']);
    }

}

function addRequest($con, $id, $request_code, $purpose, $status, $request_date, $request_docu) {
    
    $check_sql = "SELECT * FROM requests WHERE user_id = ? AND request_docu = ? AND status = 'PENDING'";
    $stmt_check = $con->prepare($check_sql);
    $stmt_check->bind_param('is', $id, $request_docu);
    $stmt_check->execute();
    $result = $stmt_check->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(['error' => 'Pending request exists with the same requested document']);
        $stmt_check->close();
        return;
    }

    $stmt_check->close();

    $sql = "INSERT INTO requests (request_code, user_id, purpose, status, request_date, request_docu) 
            VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmt = $con->prepare($sql);
    $stmt->bind_param('sissss', $request_code, $id, $purpose, $status, $request_date, $request_docu);

    if ($stmt->execute()) {
        echo json_encode(['message' => 'Request added successfully']);
    } else {
        echo json_encode(['error' => 'Failed to add request']);
    }

    $stmt->close();
    
}
