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

$notifications = NotificationsQuery::create()->findOneById($this->data["id"]);

$resultArray = Array();

if($notifications == ""){
    $item = Array();
    $item["message"] = "Unable to Save - Wrong id";
    $item["code"] = "400";
    $resultArray["meta"] = $item;
}else{
    try{$notifications->setSuitnumber($this->data["vars"]["suitnumber"]);}catch (Exception $x){}
    try{$notifications->settype($this->data["vars"]["type"]);}catch (Exception $x){}
    try{$notifications->setDocumentid($this->data["vars"]["documentid"]);}catch (Exception $x){}
    try{$notifications->setRecipients($this->data["vars"]["recipients"]);}catch (Exception $x){}
    try{$notifications->setFiler($this->data["vars"]["filer"]);}catch (Exception $x){}
    try{$notifications->setDocumentlink($this->data["vars"]["link"]);}catch (Exception $x){}
    try{$notifications->setStatus($this->data["vars"]["status"]);}catch (Exception $x){}

    try{$notifications->setCreated(time());}catch (Exception $x){}
    try{$notifications->setModified(time());}catch (Exception $x){}
    $notifications->save();

    $item = Array();
    $item["id"] = $notifications->getId();
    $item["documentid"] = $notifications->getDocumentid();
    $item["suitnumber"] = $notifications->getSuitnumber();
    $item["message"] = "Update Successfull";

    $resultArray["meta"] = $item;
}
echo json_encode($resultArray,JSON_PRETTY_PRINT);

