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

$permissions = PermissionQuery::create()->findByUserid($this->data["id"]);
//$plaintiffs = PlaintiffsQuery::create()->findBySuitnumber("A1220");
$resultArray = Array();

foreach($permissions as $permission) {
    $item = Array();
    $item["id"] = $permission->getId();
    $item["userid"] = $permission->getUserid();
    $item["code"] = $permission->getCode();
    $item["value"] = $permission->getValue();
    $item["state"] = $permission->getState();
    $item["created"] = $permission->getCreated();
    $item["modified"] = $permission->getModified();
    $resultArray["permissions"][] = $item;
}
$resultArray["meta"] = Array(
    "total" => $permissions->count()
);

echo json_encode($resultArray,JSON_PRETTY_PRINT);
