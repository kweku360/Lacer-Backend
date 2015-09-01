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

$userCheck = UsersQuery::create()->findOneByUsername($this->data["vars"]["username"]);
$resultArray = Array();

if ($userCheck == "") {
    $item = Array();
    $item["message"] = "invalid - username";
    $item["code"] = "401";
    $resultArray["meta"] = $item;

} else {
    if ($userCheck->getPassword() != $this->data["vars"]["password"]) {
        $item = Array();
        $item["message"] = "invalid - Password";
        $item["code"] = "401";
        $resultArray["meta"] = $item;
    } else {
        //password valid - generate token and return it
        $userToken = new Token();
        $userToken->setSelector(StringGenerator::randomId());
        $userToken->setToken(StringGenerator::randomAlnum(32));
        $userToken->setUserid($userCheck->getId());
        $userToken->setExpires(time() + 24 * 60 * 60);
        $userToken->setCreated(time());
        $userToken->setModified(time());

        $userToken->save();
        if ($userToken != null) {
            $item = Array();
            $item["message"] = "Success";
            $item["code"] = $userToken->getToken();
            $resultArray["meta"] = $item;

        }
    }
}
echo json_encode($resultArray,JSON_PRETTY_PRINT);