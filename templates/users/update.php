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

$userCheck = UsersQuery::create()->findOneById($this->data["id"]);
$resultArray = Array();

if($userCheck == ""){
    $item = Array();
    $item["message"] = "Unable to Save - Wrong id";
    $item["code"] = "400";
    $resultArray["meta"] = $item;
}else{
    try{$userCheck->setName($this->data["vars"]["name"]);}catch (Exception $x){}
    try{$userCheck->setPassword($this->data["vars"]["pass"]);}catch (Exception $x){}
    try{$userCheck->setEmail($this->data["vars"]["email"]);}catch (Exception $x){}
    try{$userCheck->setPhone($this->data["vars"]["phone"]);}catch (Exception $x){}
    try{$userCheck->setStatus($this->data["vars"]["status"]);}catch (Exception $x){}
    try{$userCheck->setModified(time());}catch (Exception $x){}
    $userCheck->save();

    $item = Array();
    $item["id"] = $userCheck->getId();
    $item["fullname"] = $userCheck->getName();
    $item["email"] = $userCheck->getEmail();
    $item["message"] = "Update Successfull";

    $resultArray["meta"] = $item;
}
echo json_encode($resultArray,JSON_PRETTY_PRINT);

