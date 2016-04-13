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

$resultArray = Array();

$suitlawyers = SuitlawyersQuery::create()->findById($this->data["id"]);
$suitlawyers->delete();

$resultArray["message"] = "Delete Successfull";
$resultArray["code"] = "200";
//}else{
//    $item["message"] = "Unable to delete - Please Try Again";
//    $item["code"] = "201";
//}
    echo json_encode($resultArray,JSON_PRETTY_PRINT);
//echo json_encode($resultArray,JSON_PRETTY_PRINT);

