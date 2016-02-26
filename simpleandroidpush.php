<?php
// Payload data you want to send to Android device(s)
// (it will be accessible via intent extras)    
// $data = array( 'message' => 'this message doesnt matter if extra = whereru!', 'extra' => 'whereru', 'asker' => '8BF13A775C1844669F678DBB36F6D73D', 'loc' => '40.737009, -114.043929' );
$data = array( 'extra' => 'whereru', 'asker' => '8BF13A775C1844669F678DBB36F6D73D', 'loc' => '40.737009, -114.043929' );

// The recipient registration tokens for this notification
// http://developer.android.com/google/gcm/ 
// $ids = array( 'eYI2hhRxPnc:APA91bHZSDlbPNoQdy0_HKzogw8Yi5j5IYWcREFQRgDmywscckn2ruLp5hNhm1_s0xkM5kDZ_y6zzWl0uzkaorQ0ZdGmjA6O-gyPVwhIfafPeSsCO3XpDELgHPgBbVKTX-XmB9tWnVqD', 'def' );
$ids = array( 'e4a_CgCVXa0:APA91bFSdqfdchWM8rYRKGhqF__1X_TSTzTISZEzfe2gNVOrdC46lRW_cHAaarNk4AsKUYfq8vgWHUJilE5jEmkyz8ukQ0MVfMcn9hwXbY8oZ8q9RvSqSnzgXFN28yOQ9NtB2nRN79in');

// Send a GCM push
sendGoogleCloudMessage(  $data, $ids );

function sendGoogleCloudMessage( $data, $ids )
{
    // Insert real GCM API key from Google APIs Console    // https://code.google.com/apis/console/        
    $apiKey = 'AIzaSyCltAtOcOSL5laJ8iQ5RVqNDD1v7HeFTh0';
    // Define URL to GCM endpoint
    $url = 'https://gcm-http.googleapis.com/gcm/send';
    // Set GCM post variables (device IDs and push payload)     
    $post = array(
                    'registration_ids'  => $ids,
                    'data'              => $data,
                    );
    // Set CURL request headers (authentication and type)       
    $headers = array( 
                        'Authorization: key=' . $apiKey,
                        'Content-Type: application/json'
                    );
    // Initialize curl handle       
    $ch = curl_init();
    // Set URL to GCM endpoint      
    curl_setopt( $ch, CURLOPT_URL, $url );
    // Set request method to POST       
    curl_setopt( $ch, CURLOPT_POST, true );
    // Set our custom headers       
    curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers );
    // Get the response back as string instead of printing it       
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    // Set JSON post data
    curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $post ) );
    echo '==================' . "\r\n";
    echo json_encode( $post ) . "\r\n";
    echo '==================' . "\r\n";
    // Actually send the push   
    $result = curl_exec( $ch );
    // Error handling
    if ( curl_errno( $ch ) ) {
        echo 'GCM error: ' . curl_error( $ch );
    }
    // Close curl handle
    curl_close( $ch );
    // Debug GCM response       
    echo $result;
}