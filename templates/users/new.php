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
var_dump($this->data["vars"]);
if ($userCheck == "") {

        $user = new Users();
        $user->setUsername($this->data["vars"]["username"]);
        $user->setPassword($this->data["vars"]["password"]);
        $user->setName("none");
        $user->setEmail($this->data["vars"]["email"]);
        $user->setStatus("active");
        $user->setPicture("none");
        $user->setCreated(time());
        $user->setModified(time());

        $user->save();

        if ($user != null) {
            $item = Array();
            $item["message"] = "Success";
            $item["code"] = $user->getId();
            $resultArray["meta"] = $item;

        }

} else {
    $item = Array();
    $item["message"] = "User Registered";
    $item["code"] = "422";
    $resultArray["meta"] = $item;

}
echo json_encode($resultArray,JSON_PRETTY_PRINT);