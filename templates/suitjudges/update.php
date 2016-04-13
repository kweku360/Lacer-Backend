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

$newSuitJudge = SuitjudgesQuery::create()->findOneById($this->data["id"]);

$resultArray = Array();

if($newSuitJudge == ""){
    $item = Array();
    $item["message"] = "Unable to Save - Wrong id";
    $item["code"] = "400";
    $resultArray["meta"] = $item;
}else{
    try{$newSuitJudge->setSuitnumber($this->data["vars"]["suitnumber"]);}catch (Exception $x){}
    try{$newSuitJudge->setJudgeid($this->data["vars"]["phone"]);}catch (Exception $x){}
    try{$newSuitJudge->setJudgename($this->data["vars"]["name"]);}catch (Exception $x){}
    try{$newSuitJudge->setStatus("active");}catch (Exception $x){}

    try{$newSuitJudge->setCreated(time());}catch (Exception $x){}
    try{$newSuitJudge->setModified(time());}catch (Exception $x){}
    $newSuitJudge->save();
    //next we update judge
    $newJudge = JudgesQuery::create()->findOneById($this->data["vars"]["gid"]);
        if($newJudge == ""){

        }else{
            try{$newJudge->setJudgeid($this->data["vars"]["phone"]);}catch (Exception $x){}
            try{$newJudge->setFullname($this->data["vars"]["fullname"]);}catch (Exception $x){}
            try{$newJudge->setAddress($this->data["vars"]["address"]);}catch (Exception $x){}
            try{$newJudge->setCourt($this->data["vars"]["court"]);}catch (Exception $x){}
            try{$newJudge->setEmail($this->data["vars"]["email"]);}catch (Exception $x){}
            try{$newJudge->setPhone($this->data["vars"]["phone"]);}catch (Exception $x){}
            try{$newJudge->setCourtnumber($this->data["vars"]["courtnumber"]);}catch (Exception $x){}
            try{$newJudge->setStatus($this->data["vars"]["status"]);}catch (Exception $x){}

            try{$newJudge->setCreated(time());}catch (Exception $x){}
            try{$newJudge->setModified(time());}catch (Exception $x){}
            $newJudge->save();

            $item = Array();
            $item["message"] = "Update judge Successfull";
            $resultArray["meta"] = $item;
            $resultArray["suitlawyer"] = $lawyer;
        }


}
   $item = Array();
    $item["message"] = "Save Successfull";
    $resultArray["meta"] = $item;
    $resultArray["suitjudge"] = $newSuitJudge;

    echo json_encode($resultArray,JSON_PRETTY_PRINT);

//echo json_encode($resultArray,JSON_PRETTY_PRINT);

