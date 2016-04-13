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

$newdefendant = DefendantsQuery::create()->findOneById($this->data["id"]);

$resultArray = Array();

if($newdefendant == ""){
    $item = Array();
    $item["message"] = "Unable to Save - Wrong id";
    $item["code"] = "400";
    $resultArray["meta"] = $item;
}else{
    try{$newdefendant->setSuitnumber($this->data["vars"]["suitnumber"]);}catch (Exception $x){}
    try{$newdefendant->setFullname($this->data["vars"]["fullname"]);}catch (Exception $x){}
    try{$newdefendant->setAddress($this->data["vars"]["address"]);}catch (Exception $x){
        echo $x;
    }
    try{$newdefendant->setPhone1($this->data["vars"]["phone1"]);}catch (Exception $x){}
    try{$newdefendant->setPhone2($this->data["vars"]["phone2"]);}catch (Exception $x){}
    try{$newdefendant->setEmail($this->data["vars"]["email"]);}catch (Exception $x){}
    try{$newdefendant->setStatus("active");}catch (Exception $x){}

    try{$newdefendant->setCreated(time());}catch (Exception $x){}
    try{$newdefendant->setModified(time());}catch (Exception $x){}
    $newdefendant->save();

    $item = Array();
    //$item["id"] = $newdefendant->getSuitnumber();
    $item["message"] = "Update Successfull";

    $resultArray["meta"] = $item;
}
echo json_encode($resultArray,JSON_PRETTY_PRINT);

