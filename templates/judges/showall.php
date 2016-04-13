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


$judges = JudgesQuery::create()->find();
//$plaintiffs = PlaintiffsQuery::create()->findBySuitnumber("A1220");
$resultArray = Array();

foreach($judges as $judge) {
    $item = Array();
    $item["id"] = $judge->getId();
    $item["judgeid"] = $judge->getJudgeid();
    $item["fullname"] = $judge->getFullname();
    $item["address"] = $judge->getAddress();
    $item["email"] = $judge->getEmail();
    $item["court"] = $judge->getCourt();
    $item["phone1"] = $judge->getPhone();
    $item["courtnumber"] = $judge->getCourtnumber();
    $item["status"] = $judge->getStatus();
    $item["created"] = $judge->getCreated();
    $item["modified"] = $judge->getModified();
    $resultArray["judges"][] = $item;
}
$resultArray["meta"] = Array(
    "total" => $judges->count()
);

echo json_encode($resultArray,JSON_PRETTY_PRINT);

