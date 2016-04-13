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

$newSuitLawyer = SuitlawyersQuery::create()->findOneById($this->data["id"]);

$resultArray = Array();

if($newSuitLawyer == ""){
    $item = Array();
    $item["message"] = "Unable to Save - Wrong id";
    $item["code"] = "400";
    $resultArray["meta"] = $item;
}else{
    try{$newSuitLawyer->setSuitnumber($this->data["vars"]["suitnumber"]);}catch (Exception $x){}
    try{$newSuitLawyer->setLawyerid($this->data["vars"]["phone"]);}catch (Exception $x){}
    try{$newSuitLawyer->setLawyername($this->data["vars"]["fullname"]);}catch (Exception $x){}
    try{$newSuitLawyer->setLawyertype($this->data["vars"]["lawyertype"]);}catch (Exception $x){}
    try{$newSuitLawyer->setLawyernumber($this->data["vars"]["phone"]);}catch (Exception $x){}
    try{$newSuitLawyer->setRegistertype($this->data["vars"]["registertype"]);}catch (Exception $x){}

    try{$newSuitLawyer->setCreated(time());}catch (Exception $x){}
    try{$newSuitLawyer->setModified(time());}catch (Exception $x){}
    $newSuitLawyer->save();

    //next we update lawyer
    if($newSuitLawyer->getRegistertype() == "unregistered"){
        $lawyer = UnregisteredlawyersQuery::create()->findOneById($this->data["vars"]["gid"]);
        if($lawyer == ""){

        }else{
            try{$lawyer->setLawyerid($this->data["vars"]["lawyerId"]);}catch (Exception $x){}
            try{$lawyer->setFullname($this->data["vars"]["fullname"]);}catch (Exception $x){}
            try{$lawyer->setLawfirmname($this->data["vars"]["lawfirmName"]);}catch (Exception $x){}
            try{$lawyer->setLawfirmid($this->data["vars"]["lawfirmContact"]);}catch (Exception $x){}
            try{$lawyer->setAddress($this->data["vars"]["lawyerAddress"]);}catch (Exception $x){}
            try{$lawyer->setPhone($this->data["vars"]["phone"]);}catch (Exception $x){}
            try{$lawyer->setEmail($this->data["vars"]["lawyerEmail"]);}catch (Exception $x){}
            try{$lawyer->setLawfirmid($this->data["vars"]["lawfirmContact"]);}catch (Exception $x){}
            try{$lawyer->setLawfirmname($this->data["vars"]["lawfirmName"]);}catch (Exception $x){}
            try{$lawyer->setStatus("active");}catch (Exception $x){}

            try{$lawyer->setCreated(time());}catch (Exception $x){}
            try{$lawyer->setModified(time());}catch (Exception $x){}

            $lawyer->save();
            $item = Array();
            $item["message"] = "Update unregistered Successfull";
            $resultArray["meta"] = $item;
            $resultArray["suitlawyer"] = $lawyer;
        }
    }
    if($newSuitLawyer->getRegistertype() == "registered"){
        $lawyer = UnregisteredlawyersQuery::create()->findOneById($this->data["vars"]["gid"]);
        if($lawyer == ""){

        }else{
            try{$lawyer->setLawyerid($this->data["vars"]["lawyerId"]);}catch (Exception $x){}
            try{$lawyer->setFullname($this->data["vars"]["fullname"]);}catch (Exception $x){}
            try{$lawyer->setAddress($this->data["vars"]["lawyerAddress"]);}catch (Exception $x){}
            try{$lawyer->setPhone1($this->data["vars"]["phone"]);}catch (Exception $x){}
            try{$lawyer->setPhone2($this->data["vars"]["phone"]);}catch (Exception $x){}
            try{$lawyer->setEmail($this->data["vars"]["lawyerEmail"]);}catch (Exception $x){}
            try{$lawyer->setLawfirmid($this->data["vars"]["lawfirmContact"]);}catch (Exception $x){}
            try{$lawyer->setLawfirmname($this->data["vars"]["lawfirmName"]);}catch (Exception $x){}
            try{$lawyer->setStatus("active");}catch (Exception $x){}

            try{$lawyer->setCreated(time());}catch (Exception $x){}
            try{$lawyer->setModified(time());}catch (Exception $x){}

            $lawyer->save();

            $item = Array();
            $item["message"] = "Update registered Successfull";
            $resultArray["meta"] = $item;
            $resultArray["suitlawyer"] = $lawyer;


        }
    }


}
   $item = Array();
    $item["message"] = "Save Successfull";
    $resultArray["meta"] = $item;
    $resultArray["suitlawyer"] = $newSuitLawyer;

    echo json_encode($resultArray,JSON_PRETTY_PRINT);

//echo json_encode($resultArray,JSON_PRETTY_PRINT);

