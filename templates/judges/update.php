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
//next we update judge
    $newJudge = JudgesQuery::create()->findOneById($this->data["id"]);
    $resultArray = Array();
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
            $resultArray["suitjudge"] = $newJudge;
        }

    echo json_encode($resultArray,JSON_PRETTY_PRINT);
