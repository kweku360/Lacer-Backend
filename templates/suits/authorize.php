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

$suits = SuitsQuery::create()->findOneBySuitnumber($this->data["id"]);

$resultArray = Array();

if($suits == ""){
    $item = Array();
    $item["message"] = "Unable to Save - Wrong id";
    $item["code"] = "400";
    $resultArray["meta"] = $item;
}else{

//    try{$suits->setSuitstatus($this->data["vars"]["suitstatus"]);}catch (Exception $x){}
    try{$suits->setSuitstatus("active");}catch (Exception $x){}
    try{$suits->setModified(time());}catch (Exception $x){}
    $suits->save();

    $item = Array();
    $item["id"] = $suits->getSuitnumber();
    $item["message"] = "Authorize Successfull";

    $resultArray["meta"] = $item;
}
echo json_encode($resultArray,JSON_PRETTY_PRINT);

