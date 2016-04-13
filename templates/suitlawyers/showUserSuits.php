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

$suitlawyers = SuitlawyersQuery::create()->findByLawyerid($this->data["id"]);

$suitJudges = SuitjudgesQuery::create()->findByJudgeid($this->data["id"]);
//$suitlawyers = PlaintiffsQuery::create()->findBySuitnumber("A1220");
$resultArray = Array();

foreach($suitlawyers as $suitlawyer) {
    $suits = SuitsQuery::create()->findOneBySuitnumber($suitlawyer->getSuitnumber());


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
        $resultArray["lawyersuits"][] = $item;
    }
}
//same for judges
foreach($suitJudges as $suitJudge) {

    $suits = SuitsQuery::create()->findOneBySuitnumber($suitJudge->getSuitnumber());

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
        $resultArray["judgesuits"][] = $item;
    }
}
$resultArray["meta"] = Array(
    "totallawyers" => $suitlawyers->count(),

    "totalJudges" => $suitJudges->count()
);

echo json_encode($resultArray,JSON_PRETTY_PRINT);









