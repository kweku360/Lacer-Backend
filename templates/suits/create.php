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

$suits = SuitsQuery::create()->findOneBySuitnumber($this->data["vars"]["suitnumber"]);

$resultArray = Array();

if($suits == ""){
    //means we can add new suit
    $newSuit = new Suits();
    try{$newSuit->setSuitnumber($this->data["vars"]["suitnumber"]);}catch (Exception $x){}
    try{$newSuit->settype($this->data["vars"]["type"]);}catch (Exception $x){}
    try{$newSuit->setTitle($this->data["vars"]["title"]);}catch (Exception $x){}
    try{$newSuit->setDatefiled($this->data["vars"]["datefiled"]);}catch (Exception $x){}
    try{$newSuit->setSuitstatus($this->data["vars"]["suitstatus"]);}catch (Exception $x){}
    try{$newSuit->setSuitaccess($this->data["vars"]["suitaccess"]);}catch (Exception $x){}
    try{$newSuit->setDateofadjournment($this->data["vars"]["dateofadjournment"]);}catch (Exception $x){}
    try{$newSuit->setCreated(time());}catch (Exception $x){}
    try{$newSuit->setModified(time());}catch (Exception $x){}
    $newSuit->save();

    $item = Array();
    $item["id"] = $newSuit->getSuitnumber();
    $item["message"] = "Update Successfull";
    $resultArray["meta"] = $item;


}else{
    $item = Array();
    $item["message"] = "Suit Number Exists";
    $item["code"] = "422";
    $resultArray["meta"] = $item;

}
echo json_encode($resultArray,JSON_PRETTY_PRINT);

