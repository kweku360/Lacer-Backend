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
$newDefendant = new Defendants();
try{$newDefendant->setSuitnumber($this->data["vars"]["suitnumber"]);}catch (Exception $x){}
try{$newDefendant->setFullname($this->data["vars"]["fullname"]);}catch (Exception $x){}
try{$newDefendant->setAddress($this->data["vars"]["address"]);}catch (Exception $x){}
try{$newDefendant->setPhone1($this->data["vars"]["phone1"]);}catch (Exception $x){}
try{$newDefendant->setPhone2($this->data["vars"]["phone2"]);}catch (Exception $x){}
try{$newDefendant->setEmail($this->data["vars"]["email"]);}catch (Exception $x){}
try{$newDefendant->setStatus("active");}catch (Exception $x){}

try{$newDefendant->setCreated(time());}catch (Exception $x){}
try{$newDefendant->setModified(time());}catch (Exception $x){}
$newDefendant->save();

$item = Array();
$item["id"] = $newDefendant->getSuitnumber();
$item["message"] = "Save Successfull";
$resultArray["meta"] = $item;

echo json_encode($resultArray,JSON_PRETTY_PRINT);

//echo json_encode($resultArray,JSON_PRETTY_PRINT);

