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


    $notificationdetail = new Notificationdetail();
    try{$notificationdetail->setSuitnumber($this->data["vars"]["suitnumber"]);}catch (Exception $x){}
    try{$notificationdetail->setNotificationid($this->data["vars"]["notificationid"]);}catch (Exception $x){}
    try{$notificationdetail->setMsgstatus($this->data["vars"]["msgstatus"]);}catch (Exception $x){} //success or error
    try{$notificationdetail->setMsgtxt($this->data["vars"]["msgtxt"]);}catch (Exception $x){}
    try{$notificationdetail->setPhone($this->data["vars"]["phone"]);}catch (Exception $x){}
    try{$notificationdetail->setDatetimesent(time());}catch (Exception $x){}
    try{$notificationdetail->setMsgid($this->data["vars"]["messageid"]);}catch (Exception $x){}
    try{$notificationdetail->setCreated(time());}catch (Exception $x){}
    try{$notificationdetail->setModified(time());}catch (Exception $x){}
    $notificationdetail->save();

    $item = Array();
    $item["id"] = $notificationdetail->getId();
    $item["notificationid"] = $notificationdetail->getNotificationid();
    $item["suitnumber"] = $notificationdetail->getSuitnumber();
    $item["message"] = "Save Successfull";
    $resultArray["meta"] = $item;
    echo json_encode($resultArray,JSON_PRETTY_PRINT);


//echo json_encode($resultArray,JSON_PRETTY_PRINT);

