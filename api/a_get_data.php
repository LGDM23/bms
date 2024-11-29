<?php
header('Content-Type: application/json');
session_start();
include('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET' || $_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_GET['action'])) {

        switch ($_GET['action']) {

            case 'getMyRequests':

                $id = $_GET['id'];
                getMyRequests($con, $id);

                break;

            case 'getRequests':

                getRequests($con);

                break;

            case 'getReady':

                getReady($con);

                break;

            case 'getMyReleased':

                $id = $_GET['id'];
                getMyReleased($con, $id);

                break;

            case 'getReleased':

                getReleased($con);

                break;

            case 'getAccount':

                $input = file_get_contents('php://input');
                $data = json_decode($input, true);
            
                if (isset($data['identifier'])) {

                    $identifier = $data['identifier'];
            
                    getAccount($con, $identifier);

                } else {

                    echo json_encode([
                        'success' => false,
                        'error' => 'No identifier provided'
                    ]);

                }
            
                break;

            default:
                echo json_encode(['error' => 'Invalid action']);
                break;

        }

    } else {

        echo json_encode(['error' => 'No action specified']);

    }

} else {

    echo json_encode(['error' => 'Invalid request method']);

}

$con->close();

function getAccount($con, $identifier) {
    $sql = "SELECT u.*, up.*  
            FROM users u 
            LEFT JOIN user_profile up 
            ON u.identifier = up.identifier 
            WHERE u.identifier = '$identifier'";

    $result = $con->query($sql);

    if ($result && $result->num_rows > 0) {

        $row = $result->fetch_assoc();
        $imgData = null;
        if (!empty($row['imgData'])) {
            $imgData = base64_encode($row['imgData']);
        }

        echo json_encode([
            'success' => true,
            'firstname' => $row['firstname'],
            'middlename' => $row['middlename'],
            'lastname' => $row['lastname'],
            'birthday' => $row['birthday'],
            'gender' => $row['gender'],
            'civil_status' => $row['civil_status'],
            'phone' => $row['phone'],
            'role' => $row['role'],
            'voter' => $row['voter'],
            'ecp' => $row['ecp'],
            'ecr' => $row['ecr'],
            'ecn' => $row['ecn'],
            'eca' => $row['eca'],
            'identifier' => $row['identifier'],
            'duration' => $row['duration'],
            'residency' => $row['residency'],
            'purok' => $row['purok'],
            'address' => $row['address'],
            'username' => $row['username'],
            'imgType' => $row['imgType'],
            'imgData' => $imgData,
        ]);

    } else {
        echo json_encode([
            'success' => false,
            'error' => 'No account found'
        ]);
    }
}

function getMyRequests($con, $id) {

    $sql = "SELECT r.*, a.lastname, a.middlename, a.firstname, a.purok
    FROM requests r 
    JOIN users a ON r.user_id = a.user_id 
    WHERE r.user_id = $id AND r.status != 'RELEASED'";
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
                'purok' => $row['purok'],
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

function getRequests($con) {

    $sql = "SELECT r.*, a.lastname, a.middlename, a.firstname, a.purok
    FROM requests r 
    JOIN users a ON r.user_id = a.user_id 
    WHERE r.status = 'PENDING'";
    $result = $con->query($sql);

    if ($result && $result->num_rows > 0) {
        $requests = [];
        while ($row = $result->fetch_assoc()) {
            $requests[] = [
                'id' => $row['request_id'],
                'request_code' => $row['request_code'],
                'user_id' => $row['user_id'],
                'purpose' => $row["purpose"],
                'status' => $row['status'],
                'purok' => $row['purok'],
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
function getReady($con) {

    $sql = "SELECT r.*, a.lastname, a.middlename, a.firstname, a.purok
    FROM requests r 
    JOIN users a ON r.user_id = a.user_id 
    WHERE r.status = 'READY'";
    $result = $con->query($sql);

    if ($result && $result->num_rows > 0) {
        $requests = [];
        while ($row = $result->fetch_assoc()) {
            $requests[] = [
                'id' => $row['request_id'],
                'request_code' => $row['request_code'],
                'user_id' => $row['user_id'],
                'purpose' => $row["purpose"],
                'status' => $row['status'],
                'purok' => $row['purok'],
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


function getMyReleased($con, $id) {

    $sql = "SELECT r.*, a.lastname, a.middlename, a.firstname, a.purok
    FROM requests r 
    JOIN users a ON r.user_id = a.user_id 
    WHERE r.user_id = $id AND r.status = 'RELEASED'";
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
                'purok' => $row['purok'],
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


function getReleased($con) {

    $sql = "SELECT r.*, a.lastname, a.middlename, a.firstname, a.purok
    FROM requests r 
    JOIN users a ON r.user_id = a.user_id 
    WHERE r.status = 'RELEASED'";
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
                'purok' => $row['purok'],
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
