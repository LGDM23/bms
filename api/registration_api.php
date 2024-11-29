<?php

include('database.php');
header('Content-Type: application/json');

function returnError($message) {
    echo json_encode(['error' => $message]);
    exit;
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    return substr(str_shuffle(str_repeat($characters, ceil($length / strlen($characters)))), 0, $length);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $firstname = $_POST['firstname'] ?? '';
    $middlename = $_POST['middlename'] ?? '';
    $lastname = $_POST['lastname'] ?? '';
    $birthday = $_POST['birthday'] ?? '';
    $email = $_POST['email'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $civil_status = $_POST['civil_status'] ?? '';
    $purok = $_POST['purok'] ?? '';
    $voter = $_POST['voter'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $username = $_POST['username'] ?? '';
    $password = md5($_POST['password'] ?? '');
    $role = "user";
    $ecp = $_POST['ecp'] ?? '';
    $ecr = $_POST['ecr'] ?? '';
    $ecn = $_POST['ecn'] ?? '';
    $eca = $_POST['eca'] ?? '';
    $yrs = $_POST['yrs'] ?? '';
    $unit = $_POST['unit'] ?? '';
    $house = $_POST['house'] ?? '';
    $residency = $_POST['residency'] ?? '';
    $active = 0;
    $identifier = generateRandomString();
    $pidentifier = $identifier;

    if (empty($firstname) || empty($lastname) || empty($birthday) 
    || empty($gender) || empty($civil_status) || empty($phone) 
    || empty($username) || empty($password) || empty($purok) 
    || empty($voter) || empty($ecp) || empty($ecr)
    || empty($ecn) || empty($eca) || empty($house)
    || empty($yrs) || empty($residency) || empty($unit)) {
        returnError('All fields are required.');
    }

    if (!isset($_FILES['filepond']) || $_FILES['filepond']['error'] !== UPLOAD_ERR_OK) {
        returnError('Please upload your barangay ID.');
    }

    $fileTmpPath = $_FILES['filepond']['tmp_name'];
    $fileType = $_FILES['filepond']['type'];
    $fileSize = $_FILES['filepond']['size'];

    $allowedTypes = ['image/png', 'image/jpeg', 'image/gif'];

    if ($fileSize === 0) {
        returnError('Please upload your ID.');
    }

    if (!in_array($fileType, $allowedTypes)) {
        returnError('Invalid file type. Only PNG, JPEG, and GIF images are allowed.');
    }

    $imgProp = getimagesize($fileTmpPath);
    $fileData = file_get_contents($fileTmpPath);

    $sql = "INSERT INTO users (firstname, middlename, lastname, birthday, gender, civil_status, phone, username, password, email, imgType, imgData, role, active, voter, purok, identifier)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $con->prepare($sql)) {

        $null = NULL; 

        $stmt->bind_param("sssssssssssbsisss", $firstname, $middlename, $lastname, $birthday, $gender, $civil_status, $phone, $username, $password, $email, $imgProp['mime'], $null, $role, $active, $voter, $purok, $identifier);
        $stmt->send_long_data(11, $fileData); 

        if ($stmt->execute()) {

            $sql2 = "INSERT INTO user_profile(identifier, ecp, ecr, ecn, eca, duration, residency, address) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

            if ($stmt2 = $con->prepare($sql2)) {

                $duration = sprintf($yrs.' '.$unit);
                $address = sprintf("%s", $house);

                $stmt2->bind_param("ssssssss", $pidentifier, $ecp, $ecr, $ecn, $eca, $duration, $residency, $address);
                
                if ($stmt2->execute()) {

                    echo json_encode(['success' => 'Account created successfully. Verification is being processed. Please wait for the admin to approve your registration.']);

                } else {
                    echo json_encode(['error' => 'error']);
                }
    
                $stmt2->close();
            }
            

            // echo json_encode(['success' => 'Account created successfully. Verification is being processed. Please wait for the admin to approve your registration.']);

        } else {

            echo json_encode(['error' => 'Failed to add account: ' . $stmt->error]);

        }

        $stmt->close();
    } else {
        echo json_encode(['error' => 'Failed to prepare the statement: ' . $con->error]);
    }

    $con->close();
}