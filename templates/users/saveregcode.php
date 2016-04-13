<?php
/**
 * Created by Kweku kankam for AEON CONNECT.
 * LACER project
 * Date: 8/31/15
 * Time: 8:37 AM
 */

error_reporting(-1); // reports all errors
ini_set("display_errors", "1"); // shows all errors
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");

// setup the autoloading
require_once 'vendor/autoload.php';

// setup Propel
require_once 'generated-conf/config.php';

//setup token generator
require_once 'libs/StringGenerator.php';
use Sinergi\Token\StringGenerator;

$codeCheck = RegcodeQuery::create()->findOneByPhone($this->data["vars"]["phone"]);
$resultArray = Array();

if ($codeCheck == "") {

        $regCode = new Regcode();
        $regCode->setCode($this->data["vars"]["code"]);
        $regCode->setPhone($this->data["vars"]["phone"]);
        $regCode->setStatus($this->data["vars"]["status"]);
        $regCode->setCreated(time());
        $regCode->setModified(time());

        $regCode->save();

        if ($regCode != null) {
            $item = Array();
            $item["message"] = "Success";
            $item["code"] = "201";
            $item["regCode"] = $regCode->getCode();
            $item["phone"] = $regCode->getPhone();
            $resultArray["meta"] = $item;

        }

} else {
    if($codeCheck->getStatus() == "active"){
        $item = Array();
        $item["message"] = "Phone Registered";
        $item["code"] = "401";
        $resultArray["meta"] = $item;
    }else{
        $item = Array();
        $item["message"] = "Phone   Registered";
        $item["code"] = "422";
        $item["status"] = $codeCheck->getStatus();
        $item["phone"] = $codeCheck->getPhone();
        $item["regCode"] = $codeCheck->getCode();
        $resultArray["meta"] = $item;
    }


}
echo json_encode($resultArray,JSON_PRETTY_PRINT);