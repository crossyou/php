<?php 
require_once './Google2FA.class.php';

$InitalizationKey = "PEHMPSDNLXIOG65U";					// Set the inital key

$TimeStamp	  = Google2FA::get_timestamp();
$secretkey 	  = Google2FA::base32_decode($InitalizationKey);	// Decode it into binary
$otp       	  = Google2FA::oath_hotp($secretkey, $TimeStamp);	// Get current token

echo("Init key: $InitalizationKey\n");
echo("Timestamp: $TimeStamp\n");
echo("One time password: $otp\n");

// Use this to verify a key as it allows for some time drift.

$result = Google2FA::verify_key($InitalizationKey, "123456");

var_dump($result);