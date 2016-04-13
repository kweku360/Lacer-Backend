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


$lawyers = LawyersQuery::create()->find();
//$plaintiffs = PlaintiffsQuery::create()->findBySuitnumber("A1220");
$resultArray = Array();

foreach($lawyers as $lawyer) {
    $item = Array();
    $item["id"] = $lawyer->getId();
    $item["lawyerid"] = $lawyer->getLawyerid();
    $item["fullname"] = $lawyer->getFullname();
    $item["address"] = $lawyer->getAddress();
    $item["email"] = $lawyer->getEmail();
    $item["phone1"] = $lawyer->getPhone1();
    $item["phone2"] = $lawyer->getPhone2();
    $item["status"] = $lawyer->getStatus();
    $item["speciality"] = $lawyer->getSpeciality();
    $item["lawfirmid"] = $lawyer->getLawfirmid();
    $item["lawfirmname"] = $lawyer->getLawfirmname();
    $item["created"] = $lawyer->getCreated();
    $item["modified"] = $lawyer->getModified();
    $resultArray["lawyers"][] = $item;
}
$resultArray["meta"] = Array(
    "total" => $lawyers->count()
);

echo json_encode($resultArray,JSON_PRETTY_PRINT);

