<?php

include('database.php');

require_once('session.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $authType = $_GET['auth'];
    $sql = '';
    
    switch ($authType) {

        case 'login':
            
            $username = sanitizeInput($_POST['username']);
            $password = md5(sanitizeInput($_POST['password']));

            $getCredentials = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

            $result = $con->query($getCredentials);

            if ($result->num_rows > 0) {

                $userData = $result->fetch_assoc();

                $firstname = $userData['firstname'];
                $middlename = $userData['middlename'];
                $lastname = $userData['lastname'];
                $birthday = $userData['birthday'];
                $gender = $userData['gender'];
                $civil_status = $userData['civil_status'];
                $phone = $userData['phone'];
                $username = $userData['username'];
                $password = $userData['password'];
                $imgType = $userData['imgType'];
                $imgData = $userData['imgData'];
                $role = $userData['role'];

                $_SESSION['user_id'] = $userData['user_id'];
            
                if ($userData['active'] == 1) {

                    $response = [

                        'color' => 'badge-success',
                        'message' => 'Login successful',
                        'login' => true,
                        'role' => $role,

                    ];
                    
                } else {
                        
                    $response = [

                        'color' => 'badge-info',
                        'message' => 'Verification still in progress',
                        'login' => false,
                        'role' => $role,

                    ];

                }
            
                echo json_encode($response);

            } else {

                returnError('Invalid email or password.');
                
            }
            break;
        
        default:
            returnError('Invalid authentication type.');
    }
}

$con->close();

function returnError($message) {

    echo json_encode(['error' => $message]);
    exit();
    
}
function sanitizeInput($data) {

    global $con;
    return htmlspecialchars($con->real_escape_string($data));

}

?>