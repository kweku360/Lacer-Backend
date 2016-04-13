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

$suits = SuitsQuery::create()->findOneBySuitnumber($this->data["id"]);
$resultArray = Array();

if($suits == ""){
  $resultArray["suits"] = "{}";
}else{
    $item = Array();
    $item["id"] = $suits->getId();
    $item["suitnumber"] = $suits->getSuitnumber();
    $item["title"] = $suits->getTitle();
    $item["type"] = $suits->getType();
    $item["datefiled"] = $suits->getDatefiled();
    $item["suitstatus"] = $suits->getSuitstatus();
    $item["suitaccess"] = $suits->getSuitaccess();
    $item["suitdateid"] = $suits->getSuitdateid();
    $item["suitcourt"] = $suits->getSuitcourt();
    $item["created"] = $suits->getCreated();
    $item["modified"] = $suits->getModified();
    $resultArray["suits"] = $item;
}
echo json_encode($resultArray,JSON_PRETTY_PRINT);

