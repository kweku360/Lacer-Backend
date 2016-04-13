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

$defendants = DefendantsQuery::create()->findBySuitnumber($this->data["id"]);
//$defendants = PlaintiffsQuery::create()->findBySuitnumber("A1220");
$resultArray = Array();

foreach($defendants as $defendant) {
    $item = Array();
    $item["id"] = $defendant->getId();
    $item["suitnumber"] = $defendant->getSuitnumber();
    $item["fullname"] = $defendant->getFullname();
    $item["address"] = $defendant->getAddress();
    $item["phone1"] = $defendant->getPhone1();
    $item["phone2"] = $defendant->getPhone2();
    $item["created"] = $defendant->getCreated();
    $item["modified"] = $defendant->getModified();
    $resultArray["defendants"][] = $item;
}
$resultArray["meta"] = Array(
    "total" => $defendants->count()
);

echo json_encode($resultArray,JSON_PRETTY_PRINT);

