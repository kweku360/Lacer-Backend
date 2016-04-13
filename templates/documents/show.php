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

$documents = DocumentsQuery::create()->findBySuitnumber($this->data["id"]);
//$documents = DocumentsQuery::create()->find();
//$documents = PlaintiffsQuery::create()->findBySuitnumber("A1220");
$resultArray = Array();

foreach($documents as $document) {
    $item = Array();
    $item["id"] = $document->getId();
    $item["suitnumber"] = $document->getSuitnumber();
    $item["code"] = $document->getCode();
    $item["type"] = $document->getType();
    $item["filer"] = $document->getFiler();
    $item["name"] = $document->getName();
    $item["link"] = $document->getLink();
    $item["datefiled"] = $document->getDatefiled();
    $item["accessstatus"] = $document->getAccessstatus();
    $item["created"] = $document->getCreated();
    $item["modified"] = $document->getModified();
    $resultArray["documents"][] = $item;
}
$resultArray["meta"] = Array(
    "total" => $documents->count()
);

echo json_encode($resultArray,JSON_PRETTY_PRINT);

