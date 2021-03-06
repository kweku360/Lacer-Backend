<?php
/**
 * Created by Kweku kankam for AEON CONNECT.
 * LACER project
 * Date: 8/29/15
 * Time: 4:03 AM
 */
error_reporting(-1); // reports all errors
ini_set("display_errors", "1"); // shows all errors
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");

// setup the autoloading
require_once 'vendor/autoload.php';

// setup Propel
require_once 'generated-conf/config.php';



$ch = curl_init($this->data["vars"]["smsUrl"]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec ($ch);
curl_close ($ch);

echo json_encode($output,JSON_PRETTY_PRINT);

