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

$suitlawyers = SuitlawyersQuery::create()->findBySuitnumber($this->data["id"]);
//$suitlawyers = PlaintiffsQuery::create()->findBySuitnumber("A1220");
$resultArray = Array();

foreach($suitlawyers as $suitlawyer) {
    if($suitlawyer->getRegistertype() == "unregistered"){
        $lawyer = UnregisteredlawyersQuery::create()->findOneByPhone($suitlawyer->getLawyerid());
        if($lawyer == ""){

        }else{
            $item = Array();
            $item["id"] = $lawyer->getId();
            $item["suitlawyerid"] = $suitlawyer->getId();
            $item["lawyerId"] = $lawyer->getPhone();
            $item["lawfirmname"] = $lawyer->getLawfirmname();
            $item["lawfirmphone"] = $lawyer->getLawfirmid();
            $item["fullname"] = $lawyer->getFullname();
            $item["type"] = $suitlawyer->getLawyertype();
            $item["address"] = $lawyer->getAddress();
            $item["phone1"] = $lawyer->getPhone();
            $item["email"] = $lawyer->getEmail();
            $item["status"] = $lawyer->getStatus();
            $item["created"] = $lawyer->getCreated();
            $item["modified"] = $lawyer->getModified();
            $resultArray["suitlawyers"][] = $item;
        }

    }
    if($suitlawyer->getRegistertype() == "registered"){
        $lawyer = LawyersQuery::create()->findOneByLawyerid($suitlawyer->getLawyerid());
        if($lawyer == ""){

        }else{
            $item = Array();
            $item["id"] = $lawyer->getId();
            $item["suitlawyerid"] = $suitlawyer->getId();
            $item["lawyerId"] = $lawyer->getLawyerid();
            $item["lawfirmname"] = $lawyer->getLawfirmname();
            $item["lawfirmphone"] = $lawyer->getLawfirmid();
            $item["fullname"] = $lawyer->getFullname();
            $item["type"] = $suitlawyer->getLawyertype();
            $item["address"] = $lawyer->getAddress();
            $item["phone1"] = $lawyer->getPhone1();
            $item["phone2"] = $lawyer->getPhone2();
            $item["email"] = $lawyer->getEmail();
            $item["status"] = $lawyer->getStatus();
            $item["created"] = $lawyer->getCreated();
            $item["modified"] = $lawyer->getModified();
            $resultArray["suitlawyers"][] = $item;
        }

    }

}
$resultArray["meta"] = Array(
    "total" => $suitlawyers->count()
);

echo json_encode($resultArray,JSON_PRETTY_PRINT);

