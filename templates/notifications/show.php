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


//$lawyers = LawyersQuery::create()->find();
$notifications = NotificationsQuery::create()->findBySuitnumber($this->data["id"]);
$resultArray = Array();

foreach($notifications as $notification) {
    $item = Array();
    $item["id"] = $notification->getId();
    $item["type"] = $notification->getType();
    $item["suitnumber"] = $notification->getSuitnumber();
    $item["recipients"] = $notification->getRecipients();
    $item["documentid"] = $notification->getDocumentid();
    $item["link"] = $notification->getDocumentlink();
    $item["filer"] = $notification->getFiler();
    $item["status"] = $notification->getStatus();

    $item["created"] = $notification->getCreated();
    $item["modified"] = $notification->getModified();
    $resultArray["notifications"][] = $item;
}
$resultArray["meta"] = Array(
    "total" => $notifications->count()
);

echo json_encode($resultArray,JSON_PRETTY_PRINT);
