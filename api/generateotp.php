<?php

include('database.php');
header('Content-Type: application/json');

require('../PHPMailer/Exception.php');
require('../PHPMailer/SMTP.php');
require('../PHPMailer/PHPMailer.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

$response = [
    'status' => 'error',
    'message' => 'An error occurred.'
];

if (isset($_POST['sendTo']) && isset($_POST['type'])) {

    $sendTo = $_POST['sendTo'];
    $type = $_POST['type'];

    if ($type === 'email') {

        $stmt = $con->prepare("UPDATE users SET otp = ? WHERE email = ?");
        $code = generateCode();
        $stmt->bind_param("ss", $code, $sendTo);
        
        if ($stmt->execute()) {

            sendMail($sendTo, $code, $mail);
            $response['status'] = 'success';
            $response['message'] = 'Code sent successfully to Email.';

        } else {

        }

    } elseif ($type === 'phone') {

        $stmt = $con->prepare("UPDATE users SET otp = ? WHERE phone = ?");
        $code = generateCode();
        $stmt->bind_param("ss", $code, $sendTo);
        
        if ($stmt->execute()) {

            sendSMS($sendTo, $code);
            $response['status'] = 'success';
            $response['message'] = 'Code sent successfully to phone.';

        } else {

        }

    } else {
        $response['message'] = 'Invalid type. Must be "email" or "phone".';
    }

} else {
    $response['message'] = 'Missing required parameters.';
}



function sendSMS($sendTo, $code) {

    $ch = curl_init();

    $parameters = array(
        'apikey' => 'f60f9462d5006aedbecf1d3ee7761a18',
        'number' => $sendTo,
        'message' => "BMS - Tabuyuc your OTP for password reset is ".$code.". Do not share this code with anyone.",
        'sendername' => 'eCareNet'
    );
    
    curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
    curl_setopt( $ch, CURLOPT_POST, 1 );

    curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );

    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    $output = curl_exec( $ch );
    curl_close ($ch);

    return ['status' => 'success', 'message' => 'Code sent successfully.'];

}

function sendMail($sendTo, $code, $mail) {

    try {

        $mail->addAddress($sendTo); 
        $mail->isSMTP();                                                     
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'ea00.ph@gmail.com';
        $mail->Password   = 'dpyqoiouespqozba';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;
    
    
        $mail->setFrom('ea00.ph@gmail.com', 'BMS - Password Reset OTP');
        // $mail->addAddress($sendTO);
    
        $mail->isHTML(true);
        $mail->Subject = "BMS - Password Reset OTP";
        $mail->Body    = '';
        $mail->Body .= "
                <!DOCTYPE html>
                        <html dir='ltr' xmlns='http://www.w3.org/1999/xhtml'>
                        <head>
                            <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
                            <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
                            <link rel='icon' type='image/png' sizes='16x16' href='../assets/images/favicon.png'>
                            <title>OTP</title>
                            <style>
                                body {
                                    margin: 0;
                                    font-family: Arial, sans-serif;
                                    line-height: 1.6;
                                    color: #514d6a;
                                    background-color: #f8f9fa;
                                }
                                .container {
                                    max-width: 600px;
                                    margin: auto;
                                    background-color: #ffffff;
                                    border: 1px solid #dee2e6;
                                    border-radius: 0.5rem;
                                }
                                .header {
                                    background-color: #0825D1;
                                    color: #ffffff;
                                    padding: 20px;
                                    text-align: center;
                                    border-top-left-radius: 0.5rem;
                                    border-top-right-radius: 0.5rem;
                                }
                                .content {
                                    padding: 20px;
                                }
                                .footer {
                                    padding: 10px;
                                    text-align: center;
                                    font-size: 12px;
                                    color: #6c757d;
                                }
                                /* Responsive table styles */
                                .responsive-table {
                                    width: 100%;
                                    border-collapse: collapse;
                                    margin-top: 20px;
                                }
                                .responsive-table th, .responsive-table td {
                                    border: 1px solid #dee2e6;
                                    padding: 10px;
                                    text-align: left;
                                }
                                .responsive-table th {
                                    background-color: #f1f1f1;
                                }
                                @media (max-width: 600px) {
                                    .responsive-table thead {
                                        display: none;
                                    }
                                    .responsive-table tr {
                                        display: block;
                                        margin-bottom: 15px;
                                    }
                                    .responsive-table td {
                                        display: flex;
                                        justify-content: space-between;
                                        text-align: right;
                                        padding: 5px;
                                        border: none;
                                        position: relative;
                                    }
                                    .responsive-table td::before {
                                        content: attr(data-label);
                                        position: absolute;
                                        left: 0;
                                        font-weight: bold;
                                        text-align: left;
                                    }
                                }
                            </style>
                        </head>
                        <body>
                            <div class='container'>
                                <div class='header'>
                                    <strong>Password Reset Code</strong>
                                </div>
                                <div class='content'>
                                    <p>Hello,</p>
                                        <div class='appointment-details'>
                                            <p>This is your OTP for password reset <b>".$code."</b>. Please do not share this code with anyone</p>
                                            <p>Thank you very much.</p>
                                        </div>
                                    </div>
                                    <div class='footer'>
                                        &copy; " . date('Y') . " Barangay Management System - No Reply
                                    </div>
                                </div>
                            </body>
                            </html>";
    
        if($mail->send()) {
            
    
        }

    } catch (Exception $e) {

    }
    

}

function generateCode() {

    return rand(100000, 999999);

}


echo json_encode($response);

?>
