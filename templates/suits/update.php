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
    try{$suits->setSuitnumber($this->data["vars"]["suitnumber"]);}catch (Exception $x){}
    try{$suits->settype($this->data["vars"]["type"]);}catch (Exception $x){}
    try{$suits->setTitle($this->data["vars"]["title"]);}catch (Exception $x){}
    try{$suits->setDatefiled($this->data["vars"]["datefiled"]);}catch (Exception $x){}
    try{$suits->setSuitstatus($this->data["vars"]["suitstatus"]);}catch (Exception $x){}
    try{$suits->setSuitaccess($this->data["vars"]["suitaccess"]);}catch (Exception $x){}
    try{$suits->setDateofadjournment($this->data["vars"]["dateofadjournment"]);}catch (Exception $x){}
    try{$suits->setModified(time());}catch (Exception $x){}
    $suits->save();

    $item = Array();
    $item["id"] = $suits->getSuitnumber();
    $item["message"] = "Update Successfull";

    $resultArray["meta"] = $item;
}
echo json_encode($resultArray,JSON_PRETTY_PRINT);

