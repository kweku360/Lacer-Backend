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
//var_dump($this->data["vars"]["lawFirmContact"]);
    //means we can add new suit
$newLawyer = new Unregisteredlawyers();
try{$newLawyer->setLawyerid($this->data["vars"]["lawyerId"]);}catch (Exception $x){}
try{$newLawyer->setFullname($this->data["vars"]["lawyerName"]);}catch (Exception $x){}
try{$newLawyer->setLawfirmname($this->data["vars"]["lawfirmName"]);}catch (Exception $x){}
try{$newLawyer->setLawfirmid($this->data["vars"]["lawFirmContact"]);}catch (Exception $x){}
try{$newLawyer->setAddress($this->data["vars"]["lawyerAddress"]);}catch (Exception $x){}
try{$newLawyer->setPhone($this->data["vars"]["lawyerContact1"]);}catch (Exception $x){}

try{$newLawyer->setEmail($this->data["vars"]["lawyerEmail"]);}catch (Exception $x){}
try{$newLawyer->setStatus("active");}catch (Exception $x){}

try{$newLawyer->setCreated(time());}catch (Exception $x){}
try{$newLawyer->setModified(time());}catch (Exception $x){}

$newLawyer->save();
//
//$newSuitLawyer = new Suitlawyers();
//
//    try{$newSuitLawyer->setSuitnumber($this->data["vars"]["suitnumber"]);}catch (Exception $x){}
//    try{$newSuitLawyer->setLawyerid($newLawyer->getLawyerid());}catch (Exception $x){}
//    try{$newSuitLawyer->setLawyername($newLawyer->getFullname());}catch (Exception $x){}
//    try{$newLawyer->setLawyertype($this->data["vars"]["lawyertype"]);}catch (Exception $x){}
//    try{$newLawyer->setLawyernumber($newLawyer->getPhone1());}catch (Exception $x){}
//
//    try{$newLawyer->setCreated(time());}catch (Exception $x){}
//    try{$newLawyer->setModified(time());}catch (Exception $x){}
//$newSuitLawyer->save();
//

    $item = Array();
    $item["message"] = "Save Successfull";
    $resultArray["meta"] = $item;
    $data = Array();
    $data["id"] = $newLawyer->getId();
    $data["lawyerid"] = $newLawyer->getPhone();
    $data["fullname"] = $newLawyer->getFullname();
    $data["lawyernumber"] = $newLawyer->getPhone();
    $resultArray["unregisteredlawyer"] = $data;

    echo json_encode($resultArray,JSON_PRETTY_PRINT);

//echo json_encode($resultArray,JSON_PRETTY_PRINT);

