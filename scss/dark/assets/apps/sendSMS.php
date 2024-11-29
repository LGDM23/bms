<?php

class sendSMS {
    

    public static function send($contact_number, $msg) {
        
        $ch = curl_init();

        $parameters = array(
            'apikey' => 'f60f9462d5006aedbecf1d3ee7761a18', //Your API KEY
            'number' => $contact_number,
            'message' => $msg,
            'sendername' => 'eCareNet'
        );
        
        curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
        curl_setopt( $ch, CURLOPT_POST, 1 );

        curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );

        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $output = curl_exec( $ch );
        curl_close ($ch);

    }
}

?>