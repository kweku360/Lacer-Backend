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

$suitjudges = SuitjudgesQuery::create()->findBySuitnumber($this->data["id"]);
//$suitjudges = PlaintiffsQuery::create()->findBySuitnumber("A1220");
$resultArray = Array();

foreach($suitjudges as $suitjudge) {
    $judge = JudgesQuery::create()->findOneById($suitjudge->getJudgeid());
    if($judge == ""){

    }else {
        $item = Array();
        $item["id"] = $judge->getId();
        $item["suitjudgeid"] = $suitjudge->getId();
        $item["judgeId"] = $judge->getJudgeid();
        $item["fullname"] = $judge->getFullname();
        $item["address"] = $judge->getAddress();
        $item["email"] = $judge->getEmail();
        $item["phone"] = $judge->getPhone();
        $item["courtnumber"] = $judge->getCourtnumber();
        $item["court"] = $judge->getCourt();
        $item["status"] = $judge->getStatus();
        $item["created"] = $judge->getCreated();
        $item["modified"] = $judge->getModified();
        $resultArray["suitjudges"][] = $item;
    }
}
$resultArray["meta"] = Array(
    "total" => $suitjudges->count()
);

echo json_encode($resultArray,JSON_PRETTY_PRINT);
