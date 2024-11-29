<?php
include("./database.php");
header('Content-Type: application/json');

$request_code = isset($_POST['requestCode']) ? $_POST['requestCode'] : null;
$request_docu = isset($_POST['requestDocu']) ? $_POST['requestDocu'] : null;

if (!$request_code) {

    echo json_encode(['success' => false, 'message' => 'Request code is required']);
    exit;

}

if (!$request_docu) {

    echo json_encode(['success' => false, 'message' => 'Request document type is required']);
    exit;

}

switch ($request_docu) {

    case 'Indigency':

        $sourceFile = '../forms/indigency.xlsx';
        $type = 'Indigency';
        $newFileName = '../forms/Documents/Indigency/' . $request_code . '-'.$type.'.xlsx';

        break;

    case 'ID':

        $sourceFile = '../forms/new_id.xlsx';
        $type = 'ID';
        $newFileName = '../forms/Documents/ID/' . $request_code . '-'.$type.'.xlsx';

        break;

    case 'Clearance':

        $sourceFile = '../forms/clearance.xlsx';
        $type = 'Clearance';
        $newFileName = '../forms/Documents/Clearance/' . $request_code . '-'.$type.'.xlsx';

        break;

    case 'Residency':

        $sourceFile = '../forms/residency.xlsx';
        $type = 'Residency';
        $newFileName = '../forms/Documents/Residency/' . $request_code . '-'.$type.'.xlsx';

        break;

    default:

        echo json_encode(['success' => false, 'message' => 'Invalid document type']);
        exit;

}


if (!file_exists($sourceFile)) {

    echo json_encode(['success' => false, 'message' => 'Source file not found']);
    exit;

}

if (copy($sourceFile, $newFileName)) {

    $updateStatus = "UPDATE requests SET status = 'READY' WHERE request_code = ?";

    $stmt = $con->prepare($updateStatus);
    $stmt->bind_param("s", $request_code);
    
    if ($stmt->execute()) {
        
        echo json_encode(['success' => true, 'newFileName' => $newFileName]);

    } else {

        echo json_encode(['success' => false, 'message' => 'Failed to update status']);

    }
    
    $stmt->close();

} else {

    echo json_encode(['success' => false, 'message' => 'Failed to copy and rename the file']);

}
