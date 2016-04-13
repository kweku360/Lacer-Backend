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
$notificationdetails = NotificationdetailQuery::create()->findByNotificationid($this->data["id"]);
$resultArray = Array();

foreach($notificationdetails as $notification) {
    $item = Array();
    $item["id"] = $notification->getId();
    $item["notificationid"] = $notification->getNotificationid();
    $item["suitnumber"] = $notification->getSuitnumber();
    $item["msgstatus"] = $notification->getMsgstatus();
    $item["msgtxt"] = $notification->getMsgtxt();
    $item["phone"] = $notification->getPhone();
    $item["timesent"] = $notification->getDatetimesent();
    $item["messageid"] = $notification->getMsgid();

    $item["created"] = $notification->getCreated();
    $item["modified"] = $notification->getModified();
    $resultArray["notifications"][] = $item;
}
$resultArray["meta"] = Array(
    "total" => $notificationdetails->count()
);

echo json_encode($resultArray,JSON_PRETTY_PRINT);
