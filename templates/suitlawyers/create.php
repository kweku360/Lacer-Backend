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

$newSuitLawyer = new Suitlawyers();

    try{$newSuitLawyer->setSuitnumber($this->data["vars"]["suitnumber"]);}catch (Exception $x){}
    try{$newSuitLawyer->setLawyerid($this->data["vars"]["lawyerid"]);}catch (Exception $x){}
    try{$newSuitLawyer->setLawyername($this->data["vars"]["fullname"]);}catch (Exception $x){}
    try{$newSuitLawyer->setLawyertype($this->data["vars"]["lawyertype"]);}catch (Exception $x){}
    try{$newSuitLawyer->setLawyernumber($this->data["vars"]["phone"]);}catch (Exception $x){}
    try{$newSuitLawyer->setRegistertype($this->data["vars"]["registertype"]);}catch (Exception $x){}

    try{$newSuitLawyer->setCreated(time());}catch (Exception $x){}
    try{$newSuitLawyer->setModified(time());}catch (Exception $x){}
    $newSuitLawyer->save();


    $item = Array();
    $item["message"] = "Save Successfull";
    $resultArray["meta"] = $item;
    $resultArray["suitlawyer"] = $newSuitLawyer;

    echo json_encode($resultArray,JSON_PRETTY_PRINT);

//echo json_encode($resultArray,JSON_PRETTY_PRINT);

