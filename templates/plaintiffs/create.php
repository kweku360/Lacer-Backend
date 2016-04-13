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

    //means we can add new suit
    $newPlaintiff = new Plaintiffs();
    try{$newPlaintiff->setSuitnumber($this->data["vars"]["suitnumber"]);}catch (Exception $x){}
    try{$newPlaintiff->setFullname($this->data["vars"]["fullname"]);}catch (Exception $x){}
    try{$newPlaintiff->setAddress($this->data["vars"]["address"]);}catch (Exception $x){}
    try{$newPlaintiff->setPhone1($this->data["vars"]["phone"]);}catch (Exception $x){}
    try{$newPlaintiff->setPhone2($this->data["vars"]["phone1"]);}catch (Exception $x){}
    try{$newPlaintiff->setEmail($this->data["vars"]["email"]);}catch (Exception $x){}
    try{$newPlaintiff->setStatus("active");}catch (Exception $x){}

    try{$newPlaintiff->setCreated(time());}catch (Exception $x){}
    try{$newPlaintiff->setModified(time());}catch (Exception $x){}
    $newPlaintiff->save();

    $item = Array();
    $item["id"] = $newPlaintiff->getSuitnumber();
    $item["message"] = "Save Successfull";
    $resultArray["meta"] = $item;

    echo json_encode($resultArray,JSON_PRETTY_PRINT);

//echo json_encode($resultArray,JSON_PRETTY_PRINT);

