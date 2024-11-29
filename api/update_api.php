<?php

include('database.php');
header('Content-Type: application/json');

function returnError($message) {
    echo json_encode(['error' => $message]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $identifier = $_POST['identifier'] ?? '';
    $firstname = $_POST['firstname'] ?? '';
    $middlename = $_POST['middlename'] ?? '';
    $lastname = $_POST['lastname'] ?? '';
    $birthday = $_POST['birthday'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $civil_status = $_POST['civil_status'] ?? '';
    $purok = $_POST['purok'] ?? '';
    $voter = $_POST['voter'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $username = $_POST['username'] ?? '';
    $role = "user";
    $ecp = $_POST['ecp'] ?? '';
    $ecr = $_POST['ecr'] ?? '';
    $ecn = $_POST['ecn'] ?? '';
    $eca = $_POST['eca'] ?? '';
    $yrs = $_POST['yrs'] ?? '';
    $house = $_POST['house'] ?? '';
    $residency = $_POST['residency'] ?? '';

    if (empty($identifier) || empty($firstname) || empty($lastname) || empty($birthday) 
    || empty($gender) || empty($civil_status) || empty($phone) 
    || empty($username) || empty($purok) 
    || empty($voter) || empty($ecp) || empty($ecr)
    || empty($ecn) || empty($eca) || empty($house)
    || empty($yrs) || empty($residency)) {
        returnError('All fields are required.');
    }

    $sql = "UPDATE users SET firstname = ?, middlename = ?, lastname = ?, birthday = ?, gender = ?, 
            civil_status = ?, phone = ?, username = ?, role = ?, voter = ?, purok = ? WHERE identifier = ?";

    if ($stmt = $con->prepare($sql)) {

        $stmt->bind_param("ssssssssssss", $firstname, $middlename, $lastname, $birthday, $gender, 
                          $civil_status, $phone, $username, $role, $voter, $purok, $identifier);

        if ($stmt->execute()) {

            $sql2 = "UPDATE user_profile SET ecp = ?, ecr = ?, ecn = ?, eca = ?, residency = ? WHERE identifier = ?";

            if ($stmt2 = $con->prepare($sql2)) {


                $stmt2->bind_param("ssssss", $ecp, $ecr, $ecn, $eca, $residency, $identifier);
                
                if ($stmt2->execute()) {

                    echo json_encode(['success' => 'Account updated successfully.']);

                } else {
                    returnError('Failed to update user profile.');
                }
    
                $stmt2->close();
            } else {
                returnError('Failed to prepare user profile update statement: ' . $con->error);
            }

        } else {
            returnError('Failed to update account: ' . $stmt->error);
        }

        $stmt->close();
    } else {
        returnError('Failed to prepare the main update statement: ' . $con->error);
    }

    $con->close();
}