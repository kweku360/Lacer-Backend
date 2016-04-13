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

$suits = SuitsQuery::create()->find();
$resultArray = Array();
foreach($suits as $suit) {
  $item = Array();
  $item["id"] = $suit->getId();
  $item["suitnumber"] = $suit->getSuitnumber();
  $item["title"] = $suit->getTitle();
  $item["type"] = $suit->getType();
  $item["datefiled"] = $suit->getDatefiled();
  $item["suitstatus"] = $suit->getSuitstatus();
  $item["suitaccess"] = $suit->getSuitaccess();
  $item["suitcourt"] = $suit->getSuitcourt();
  $item["created"] = $suit->getCreated();
  $item["modified"] = $suit->getModified();
  $resultArray["suits"][] = $item;
}
$resultArray["meta"][] = Array(
    "total" => $suits->count()
);
http_response_code(404);
echo json_encode($resultArray,JSON_PRETTY_PRINT);