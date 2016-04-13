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

$permission = PermissionQuery::create()->findOneById($this->data["id"]);

$resultArray = Array();

if($permission == ""){
    $item = Array();
    $item["message"] = "Unable to Save - Wrong id";
    $item["code"] = "400";
    $resultArray["meta"] = $item;
}else{
   try{$permission->setValue($this->data["vars"]["pval"]);}catch (Exception $x){}
   try{$permission->setState("Default");}catch (Exception $x){}
    try{$permission->setModified(time());}catch (Exception $x){}
    $permission->save();

    $item = Array();

    $item["id"] =$permission->getId();
    $item["message"] = "Update Successful";

    $resultArray["meta"] = $item;
}
echo json_encode($resultArray,JSON_PRETTY_PRINT);

