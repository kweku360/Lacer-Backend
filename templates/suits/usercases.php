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

$lawyersuits = SuitlawyersQuery::create()->findByLawyerid($this->data["id"]);
//$suitlawyers = PlaintiffsQuery::create()->findBySuitnumber("A1220");
$resultArray = Array();

foreach($lawyersuits as $lawyersuit) {
    $suits = SuitsQuery::create()->findOneBySuitnumber($lawyersuit->getSuitnumber());
    $item = Array();

    $item["id"] = $suits->getId();
    $item["suitnumber"] = $suits->getSuitnumber();
    $item["title"] = $suits->getTitle();
    $item["type"] = $suits->getType();
    $item["datefiled"] = $suits->getDatefiled();
    $item["suitstatus"] = $suits->getSuitstatus();
    $item["suitaccess"] = $suits->getSuitaccess();
    $item["suitdateid"] = $suits->getSuitdateid();
    $item["created"] = $suits->getCreated();
    $item["modified"] = $suits->getModified();
    $resultArray["suits"] = $item;
}
$resultArray["meta"] = Array(
    "total" => $lawyersuits->count()
);

echo json_encode($resultArray,JSON_PRETTY_PRINT);