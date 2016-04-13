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

$codeCheck = RegcodeQuery::create()->findOneByCode($this->data["id"]);
$resultArray = Array();

if ($codeCheck == "") {
//Code not valid


            $item = Array();
            $item["message"] = "Code not Found";
            $item["code"] = "401";
            $resultArray["meta"] = $item;


} else {
    if($codeCheck->getStatus() == "active"){
        $item = Array();
        $item["message"] = "Code Already in use";
        $item["code"] = "400";
        $resultArray["meta"] = $item;
    }else{
        $item = Array();
        $item["message"] = "Code verified";
        $item["code"] = "201";
        $item["status"] = $codeCheck->getStatus();
        $item["phone"] = $codeCheck->getPhone();
        $item["regCode"] = $codeCheck->getCode();
        $resultArray["meta"] = $item;
    }


}
echo json_encode($resultArray,JSON_PRETTY_PRINT);