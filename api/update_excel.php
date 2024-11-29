<?php
require_once "../Classes/PHPExcel.php";
include('database.php');

header('Content-Type: application/json');

if (isset($_POST['fileName'])) {

    $fileName = $_POST['fileName'];
    $ctrl = $_POST['ctrl'];
    $datetodz = $_POST['datetodz'];
    $requestee = $_POST['user_id'];
    $purpose = $_POST["purpose"];
    $docu = $_POST["docu"];
    $record = "";

    if($docu == "Clearance") {
        $record = $_POST['record'];
        $orno = $_POST['orno'];
        $cedula = $_POST['cedula'];
    }

    $sql = "SELECT * FROM users WHERE user_id = ?";

    $stmt = $con->prepare($sql);

    $stmt->bind_param('i', $requestee);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        $userRecord = $result->fetch_assoc();

        $fname = $userRecord['firstname']." ".$userRecord['middlename']." ".$userRecord['lastname'];
        $bday = $userRecord['birthday'];
        $purok = $userRecord['purok'];
        $civil = $userRecord['civil_status'];
        $identifier = $userRecord['identifier'];
        $phone = $userRecord['phone'];


    } else {
        echo "User not found";
    }

    $sql = "SELECT * FROM user_profile WHERE identifier = ?";

    $stmt = $con->prepare($sql);

    $stmt->bind_param('s', $identifier);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        $userRecord = $result->fetch_assoc();

        $ecp = $userRecord['ecp'];
        $ecr = $userRecord['ecr'];
        $ecn = $userRecord['ecn'];
        $eca = $userRecord['eca'];


    } else {
        echo "User not found";
    }

    $sql = "SELECT id_number FROM id_number";

    $stmt = $con->prepare($sql);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        $userRecord = $result->fetch_assoc();

        $currentCount = $userRecord['id_number'];

    } else {

        echo "User not found";

    }

    $id_num = (int) $currentCount + 1;

    $sql = "UPDATE id_number SET id_number = ?";

    $stmt = $con->prepare($sql);

    $stmt->bind_param("s", $id_num);

    $stmt->execute();

    $expirationDate = new DateTime();
    $expirationDate->modify('+1 year');
    $formattedExpirationDate = $expirationDate->format('m/Y');

    $birthDate = new DateTime($bday);

    $formattedBday = $birthDate->format('F j, Y');

    $currentDate = new DateTime();

    $birthDate = new DateTime($bday);
    
    $age = $currentDate->diff($birthDate)->y;

    $today = new DateTime();

    function addOrdinalSuffix($day) {
        if (!in_array(($day % 100), [11, 12, 13])) {
            switch ($day % 10) {
                case 1: return $day . 'st';
                case 2: return $day . 'nd';
                case 3: return $day . 'rd';
            }
        }
        return $day . 'th';
    }

    $dayWithSuffix = addOrdinalSuffix($today->format('j'));

    $formattedDate2 = $dayWithSuffix . ' day of ' . strtoupper($today->format('F')) . ', ' . $today->format('Y');


    switch ($docu) {

        case 'Indigency':

                createIndigency($fileName, $fname, $age, $formattedBday, $civil, $purok, $purpose, $formattedDate2);

            break;

        case 'Clearance':

                createClearance($fileName, $fname, $age, $formattedBday, $civil, $purok, $record, $purpose, $formattedDate2, $ctrl, $orno, $cedula);
                
            break;

        case 'Residency':

                createResidency($fileName, $fname, $age, $formattedBday, $civil, $purok, $purpose, $formattedDate2);

            break;
            
        case 'ID':

                createID($fileName, $id_num,$fname, $formattedBday, $civil, $purok, $phone, $ecp, $eca, $ecn, $formattedExpirationDate);

            break;
        
        default:

            # code...
            break;

    }


    

} else {
    echo json_encode(['success' => false, 'message' => 'File name and name are required.']);
}

function createID($fileName, $id_num, $fname, $formattedBday, $civil, $purok, $phone, $ecp, $eca, $ecn, $formattedExpirationDate) {

    $reader = PHPExcel_IOFactory::createReaderForFile($fileName);

    $excel_obj = $reader->load($fileName);
    
    $worksheet = $excel_obj->getActiveSheet();


    $C7 = new PHPExcel_RichText();

    $C7->createText();
    $boldTextA12 = $C7->createTextRun('ID #: '.$id_num);
    $boldTextA12->getFont()->setBold(true)->setName('Calibri')->setSize(11)->getColor()->setRGB('FFFFFF');
    $worksheet->getCell('C7')->setValue($C7);

    $C9 = new PHPExcel_RichText();
    $C9->createText();
    $boldTextA12 = $C9->createTextRun($fname);
    $boldTextA12->getFont()->setBold(true)->setName('Calibri')->setSize(12)->setUnderline(true)->getColor()->setRGB('FFFFFF');
    $worksheet->getCell('C9')->setValue($C9);

    $A13 = new PHPExcel_RichText();
    $A13->createText();
    $boldTextA12 = $A13->createTextRun('     Date of Birth : '.$formattedBday);
    $boldTextA12->getFont()->setBold(true);
    $worksheet->getCell('A13')->setValue($A13);

    $A13 = new PHPExcel_RichText();
    $A13->createText();
    $boldTextA12 = $A13->createTextRun('     Civil Status : '.$civil);
    $boldTextA12->getFont()->setBold(true);
    $worksheet->getCell('A14')->setValue($A13);

    $A13 = new PHPExcel_RichText();
    $A13->createText();
    $boldTextA12 = $A13->createTextRun('     Address : '.$purok.", Tabuyuc, Apalit, Pampanga");
    $boldTextA12->getFont()->setBold(true);
    $worksheet->getCell('A15')->setValue($A13);

    $A13 = new PHPExcel_RichText();
    $A13->createText();
    $boldTextA12 = $A13->createTextRun('     Contact No. : '.$phone);
    $boldTextA12->getFont()->setBold(true);
    $worksheet->getCell('A16')->setValue($A13);

    $A13 = new PHPExcel_RichText();
    $A13->createText();
    $boldTextA12 = $A13->createTextRun('     Name : '.$ecp);
    $boldTextA12->getFont()->setBold(true)->setName('Calibri')->setSize(10)->getColor()->setRGB('FFFFFF');
    $worksheet->getCell('A19')->setValue($A13);

    $A13 = new PHPExcel_RichText();
    $A13->createText();
    $boldTextA12 = $A13->createTextRun('     Address : '.$eca);
    $boldTextA12->getFont()->setBold(true)->setName('Calibri')->setSize(10)->getColor()->setRGB('FFFFFF');
    $worksheet->getCell('A20')->setValue($A13);

    $A13 = new PHPExcel_RichText();
    $A13->createText();
    $boldTextA12 = $A13->createTextRun('     Address : '.$ecn);
    $boldTextA12->getFont()->setBold(true)->setName('Calibri')->setSize(10)->getColor()->setRGB('FFFFFF');
    $worksheet->getCell('A21')->setValue($A13);

    $A13 = new PHPExcel_RichText();
    $A13->createText();
    $boldTextA12 = $A13->createTextRun('     Expiration Date : '.$formattedExpirationDate);
    $boldTextA12->getFont()->setBold(true)->setName('Calibri')->setSize(10)->getColor()->setRGB('FFFFFF');
    $worksheet->getCell('E18')->setValue($A13);


    $writer = PHPExcel_IOFactory::createWriter($excel_obj, 'Excel2007');
    $writer->save($fileName);

    echo json_encode(['success' => true]);

}

function createResidency($fileName, $fname, $age, $formattedBday, $civil, $purok, $purpose, $formattedDate2) {

    $reader = PHPExcel_IOFactory::createReaderForFile($fileName);

    $excel_obj = $reader->load($fileName);
    
    $worksheet = $excel_obj->getActiveSheet();


    $D15 = new PHPExcel_RichText();

    $D15->createText('                              This is to Certify that ');
    
    $boldTextA12 = $D15->createTextRun($fname);
    $boldTextA12->getFont()->setBold(true);
    

    $D15->createText(' , ');
    
    $boldAge = $D15->createTextRun($age);
    $boldAge->getFont()->setBold(true);

    $D15->createText(' yrs. old, born on ');
    
    $boldTextBday = $D15->createTextRun($formattedBday);
    $boldTextBday->getFont()->setBold(true);

    
    $D15->createText(', ');
    $boldTextCivil = $D15->createTextRun($civil);
    $boldTextCivil->getFont()->setBold(true);
    
    $D15->createText(' and is a bona fide resident of ');
    
    $boldTextPurok = $D15->createTextRun($purok.', Barangay Tabuyuc, Apalit, Pampanga');
    $boldTextPurok->getFont()->setBold(true);
    
    $worksheet->getCell('D15')->setValue($D15);

    $D19 = new PHPExcel_RichText();
    $D19->createText('                  It is further certified that the above-named person has been a resident of this Barangay since birth up to present.');

    $worksheet->getCell('D19')->setValue($D19);

    $D21 = new PHPExcel_RichText();
    $D21->createText('                   This Certificate of Indigency is being issued upon the request of the above-named individual for ');
    $boldTextCivil = $D21->createTextRun($purpose);
    $boldTextCivil->getFont()->setBold(true);
    $worksheet->getCell('D21')->setValue($D21);
    
    $D23 = new PHPExcel_RichText();
    $D23->createText('                   Issued this ');
    $boldTextdate = $D23->createTextRun($formattedDate2);
    $boldTextdate->getFont()->setBold(true);
    $D23->createText(' at the Office of Punong Barangay Tabuyuc, Apalit, Pampanga. ');
    $worksheet->getCell('D23')->setValue($D23);

    $writer = PHPExcel_IOFactory::createWriter($excel_obj, 'Excel2007');
    $writer->save($fileName);

    echo json_encode(['success' => true]);

}

function createClearance($fileName, $fname, $age, $formattedBday, $civil, $purok, $record, $purpose, $formattedDate2, $ctrl, $orno, $cedula) {

    $reader = PHPExcel_IOFactory::createReaderForFile($fileName);

    $excel_obj = $reader->load($fileName);
    
    $worksheet = $excel_obj->getActiveSheet();


    $richTextD15 = new PHPExcel_RichText();

    $richTextD15->createText('               This is to certify that ');
    
    $boldTextA12 = $richTextD15->createTextRun($fname);
    $boldTextA12->getFont()->setBold(true);
    

    $richTextD15->createText(' , ');
    
    $boldAge = $richTextD15->createTextRun($age);
    $boldAge->getFont()->setBold(true);

    $richTextD15->createText(' yrs. old, born on ');
    
    $boldTextBday = $richTextD15->createTextRun($formattedBday);
    $boldTextBday->getFont()->setBold(true);

    
    $richTextD15->createText(', ');
    $boldTextCivil = $richTextD15->createTextRun($civil);
    $boldTextCivil->getFont()->setBold(true);
    
    $richTextD15->createText(' whose thumb mark appears here under is a bona fide resident of this Barangay with postal address at ');
    
    $boldTextPurok = $richTextD15->createTextRun($purok.', Barangay Tabuyuc, Apalit, Pampanga');
    $boldTextPurok->getFont()->setBold(true);
    $worksheet->getCell('D15')->setValue($richTextD15);
    //end D15
    $richTextD19 = new PHPExcel_RichText();
    $richTextD19->createText('               This is to certify further that the subject person has ');
    
    $boldTextRecord = $richTextD19->createTextRun($record);
    $boldTextRecord->getFont()->setBold(true);

    $richTextD19->createText(' nor any pending case filed against  him/her in the Lupon Tagapamayapa of this Barangay to date.');

    $worksheet->getCell('D19')->setValue($richTextD19);
    //end D19

    // $richTextA17 = new PHPExcel_RichText();
    
    $richTextD21 = new PHPExcel_RichText();
    $richTextD21->createText('               This certifification is being issued upon the request of the above-named individual for any legal purposes');

    $worksheet->getCell('D21')->setValue($richTextD21);
    //end D21

    $richTextD23 = new PHPExcel_RichText();
    $richTextD23->createText('               This Barangay Clearance is being issued upon the request of the above-named individual for ');
    $boldTextPurpose = $richTextD23->createTextRun($purpose);
    $boldTextPurpose->getFont()->setBold(true);

    $worksheet->getCell('D23')->setValue($richTextD23);
    //end D23
    
    $richTextD25 = new PHPExcel_RichText();
    $richTextD25->createText('               Given and signed this ');
    $boldTextdate = $richTextD25->createTextRun($formattedDate2);
    $boldTextdate->getFont()->setBold(true);
    $richTextD25->createText(' at the Office of Punong Barangay Tabuyuc, Apalit, Pampanga. ');
    $worksheet->getCell('D25')->setValue($richTextD25);

    $richTextA40 = new PHPExcel_RichText();
    $richTextA40->createText('CTC NO. :  '.$cedula);
    $worksheet->getCell('A40')->setValue($richTextA40);

    $richTextA41 = new PHPExcel_RichText();
    $richTextA41->createText('O.R. NO. :  '.$orno);
    $worksheet->getCell('A41')->setValue($richTextA41);

    $richTextA42 = new PHPExcel_RichText();
    $richTextA42->createText('Control # :  '.$ctrl);
    $worksheet->getCell('A42')->setValue($richTextA42);

    $writer = PHPExcel_IOFactory::createWriter($excel_obj, 'Excel2007');
    $writer->save($fileName);

    echo json_encode(['success' => true]);

}

function createIndigency($fileName, $fname, $age, $formattedBday, $civil, $purok, $purpose, $formattedDate2) {

    $reader = PHPExcel_IOFactory::createReaderForFile($fileName);

    $excel_obj = $reader->load($fileName);
    
    $worksheet = $excel_obj->getActiveSheet();


    $richTextA12 = new PHPExcel_RichText();

    $richTextA12->createText('                              This is to Certify that ');
    
    $boldTextA12 = $richTextA12->createTextRun($fname);
    $boldTextA12->getFont()->setBold(true);
    

    $richTextA12->createText(' , ');
    
    $boldAge = $richTextA12->createTextRun($age);
    $boldAge->getFont()->setBold(true);

    $richTextA12->createText(' yrs. old, born on ');
    
    $boldTextBday = $richTextA12->createTextRun($formattedBday);
    $boldTextBday->getFont()->setBold(true);

    
    $richTextA12->createText(', ');
    $boldTextCivil = $richTextA12->createTextRun($civil);
    $boldTextCivil->getFont()->setBold(true);
    
    $richTextA12->createText(' and is a bona fide resident of ');
    
    $boldTextPurok = $richTextA12->createTextRun($purok.', Barangay Tabuyuc, Apalit, Pampanga');
    $boldTextPurok->getFont()->setBold(true);
    
    $richTextA12->createText('. He/She is personally known to me and known to be of good moral character.');
    
    $worksheet->getCell('A14')->setValue($richTextA12);

    $richTextA17 = new PHPExcel_RichText();
    $richTextA17->createText('                  It is further certified that the above-named person belongs to the indigents and belongs to the low-income families in our barangay.');

    $worksheet->getCell('A19')->setValue($richTextA17);

    $richTextA20 = new PHPExcel_RichText();
    $richTextA20->createText('                       This Certificate of Indigency is being issued upon the request of the above-named individual for ');
    $boldTextCivil = $richTextA20->createTextRun($purpose);
    $boldTextCivil->getFont()->setBold(true);
    $worksheet->getCell('A22')->setValue($richTextA20);
    
    $richTextA24 = new PHPExcel_RichText();
    $richTextA24->createText('Issued this ');
    $boldTextdate = $richTextA24->createTextRun($formattedDate2);
    $boldTextdate->getFont()->setBold(true);
    $richTextA24->createText(' at the Office of Punong Barangay Tabuyuc, Apalit, Pampanga. ');
    $worksheet->getCell('A26')->setValue($richTextA24);

    $writer = PHPExcel_IOFactory::createWriter($excel_obj, 'Excel2007');
    $writer->save($fileName);

    echo json_encode(['success' => true]);

}