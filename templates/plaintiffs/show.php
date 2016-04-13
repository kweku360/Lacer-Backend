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

$plaintiffs = PlaintiffsQuery::create()->findBySuitnumber($this->data["id"]);
//$plaintiffs = PlaintiffsQuery::create()->findBySuitnumber("A1220");
$resultArray = Array();

foreach($plaintiffs as $plaintiff) {
    $item = Array();
    $item["id"] = $plaintiff->getId();
    $item["suitnumber"] = $plaintiff->getSuitnumber();
    $item["fullname"] = $plaintiff->getFullname();
    $item["address"] = $plaintiff->getAddress();
    $item["email"] = $plaintiff->getEmail();
    $item["phone1"] = $plaintiff->getPhone1();
    $item["phone2"] = $plaintiff->getPhone2();
    $item["created"] = $plaintiff->getCreated();
    $item["modified"] = $plaintiff->getModified();
    $resultArray["plaintiffs"][] = $item;
}
$resultArray["meta"] = Array(
    "total" => $plaintiffs->count()
);

echo json_encode($resultArray,JSON_PRETTY_PRINT);

