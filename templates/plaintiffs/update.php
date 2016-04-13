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

$newplaintiff = PlaintiffsQuery::create()->findOneById($this->data["id"]);

$resultArray = Array();

if($newplaintiff == ""){
    $item = Array();
    $item["message"] = "Unable to Save - Wrong id";
    $item["code"] = "400";
    $resultArray["meta"] = $item;
}else{
    try{$newplaintiff->setSuitnumber($this->data["vars"]["suitnumber"]);}catch (Exception $x){}
    try{$newplaintiff->setFullname($this->data["vars"]["fullname"]);}catch (Exception $x){}
    try{$newplaintiff->setAddress($this->data["vars"]["address"]);}catch (Exception $x){
        echo $x;
    }
    try{$newplaintiff->setPhone1($this->data["vars"]["phone"]);}catch (Exception $x){}
    try{$newplaintiff->setPhone2($this->data["vars"]["phone1"]);}catch (Exception $x){}
    try{$newplaintiff->setEmail($this->data["vars"]["email"]);}catch (Exception $x){}
    try{$newplaintiff->setStatus("active");}catch (Exception $x){}

    try{$newplaintiff->setCreated(time());}catch (Exception $x){}
    try{$newplaintiff->setModified(time());}catch (Exception $x){}
    $newplaintiff->save();

    $item = Array();
    //$item["id"] = $newplaintiff->getSuitnumber();
    $item["message"] = "Update Successful";

    $resultArray["meta"] = $item;
}
echo json_encode($resultArray,JSON_PRETTY_PRINT);

