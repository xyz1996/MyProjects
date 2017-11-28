<?php
    require_once "autoload.php";
    class a extends Client{
    /*$AccountSid = "AC869a059a57b8afb3e6116d7def5fcc61";
    $AuthToken = "73b34b96bd805f6409c9fa8a2d7d56af";
*/

    try {
        // Initiate a new outbound call
     $call =     new Client("AC869a059a57b8afb3e6116d7def5fcc61","73b34b96bd805f6409c9fa8a2d7d56af");
->account->calls->create(
            
            "+918982756076",

            "+14847860198 ",

            // Step 6: Set the URL Twilio will request when the call is answered.
            array("url" => "http://demo.twilio.com/welcome/voice/")
        );
        echo "Started call: " . $call->sid;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }}