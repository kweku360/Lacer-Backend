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

$userCheck = UsersQuery::create()->findOneByEmail($this->data["vars"]["email"]);
$resultArray = Array();

if ($userCheck == "") {

        $user = new Users();
        $user->setPhone(StringGenerator::randomNumeric(8));
        $user->setPassword($this->data["vars"]["password"]);
        $user->setPosition("admin-user");
        $user->setEmailcode(StringGenerator::randomNumeric(5));
        $user->setName($this->data["vars"]["fullname"]);
        $user->setEmail($this->data["vars"]["email"]);
        $user->setStatus("active");
        $user->setPicture("none");
        $user->setCreated(time());
        $user->setModified(time());

        $user->save();
    $item = Array();
    $item["message"] = "Success";
    $item["code"] = $user->getId();
    $resultArray["meta"] = $item;

    //create a default permission for new admin user
    $codes = array("501","502","503","504","505","506","507","508","509","510","511",);
    $arrlength = count($codes);
    for($i=0;$i <$arrlength;$i++){
        $permission = new Permission();
        $permission->setUserid($user->getId());
        $permission->setCode($codes[$i]);
        $permission->setValue(0);
        $permission->setState("Default");
        $permission->setCreated(time());
        $permission->setModified(time());
        $permission->save();
    }

} else {
    $item = Array();
    $item["message"] = "User Registered";
    $item["code"] = "422";
    $resultArray["meta"] = $item;

}

echo json_encode($resultArray,JSON_PRETTY_PRINT);

