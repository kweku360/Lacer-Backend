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
    $permission = new Permission();
    try{$permission->setUserid($this->data["vars"]["userid"]);}catch (Exception $x){}
    try{$permission->setCode($this->data["vars"]["code"]);}catch (Exception $x){}
    try{$permission->setValue($this->data["vars"]["value"]);}catch (Exception $x){}
    try{$permission->setState($this->data["vars"]["state"]);}catch (Exception $x){}

    try{$permission->setCreated(time());}catch (Exception $x){}
    try{$permission->setModified(time());}catch (Exception $x){}
    $permission->save();

//return array
    $item = Array();
    $item["id"] = $permission->getId();
    $item["message"] = "permission created successfully";
    $resultArray["meta"] = $item;
    echo json_encode($resultArray,JSON_PRETTY_PRINT);
