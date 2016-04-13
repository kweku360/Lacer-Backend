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

$users = UsersQuery::create()->findByPosition("admin-user");
$resultArray = Array();

foreach($users as $user) {
    $item = Array();

    $item["id"] = $user->getId();
    $item["fullname"] = $user->getName();
    $item["email"] = $user->getEmail();
    $item["status"] = $user->getStatus();
    $item["created"] = $user->getCreated();
    $item["modified"] = $user->getModified();
    $resultArray["users"][] = $item;
}
$resultArray["meta"] = Array(
    "total" => $users->count()
);

echo json_encode($resultArray,JSON_PRETTY_PRINT);

