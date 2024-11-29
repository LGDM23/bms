<?php 

    include ("./database.php");

    $request_code = $_POST['requestCode'];

    $updateStatus = "UPDATE requests SET status = 'RELEASED' WHERE request_code = ?";

    $stmt = $con->prepare($updateStatus);
    $stmt->bind_param("s", $request_code);
    
    if ($stmt->execute()) {
        
        echo json_encode(['success' => true, 'request' => $request_code]);

    } else {

        echo json_encode(['success' => false, 'message' => 'Failed to update status']);

    }
    
    $stmt->close();