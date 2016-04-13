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

$newDocument = DocumentsQuery::create()->findOneById($this->data["id"]);

$resultArray = Array();

if($newDocument == ""){
    $item = Array();
    $item["message"] = "Unable to Save - Wrong id";
    $item["code"] = "400";
    $resultArray["meta"] = $item;
}else{
    try{$newDocument->setSuitnumber($this->data["vars"]["suitnumber"]);}catch (Exception $x){}
    try{$newDocument->setCode($this->data["vars"]["code"]);}catch (Exception $x){}
    try{$newDocument->setFiler($this->data["vars"]["documentFiler"]);}catch (Exception $x){}
    try{$newDocument->settype($this->data["vars"]["type"]);}catch (Exception $x){}
    try{$newDocument->setName($this->data["vars"]["name"]);}catch (Exception $x){}
    try{$newDocument->setLink($this->data["vars"]["link"]);}catch (Exception $x){}
    try{$newDocument->setDatefiled($this->data["vars"]["datefiled"]);}catch (Exception $x){}
    try{$newDocument->setDataentrypersonid($this->data["vars"]["dataentryid"]);}catch (Exception $x){}
    try{$newDocument->setAccessstatus("active");}catch (Exception $x){}

    try{$newDocument->setCreated(time());}catch (Exception $x){}
    try{$newDocument->setModified(time());}catch (Exception $x){}
    $newDocument->save();

    $item = Array();
    //$item["id"] = $newdefendant->getSuitnumber();
    $item["message"] = "Update Successful";

    $resultArray["meta"] = $item;
}
echo json_encode($resultArray,JSON_PRETTY_PRINT);

