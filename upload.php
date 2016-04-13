<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 9/7/15
 * Time: 3:52 AM
 */
error_reporting(-1); // reports all errors
ini_set("display_errors", "1"); // shows all errors
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");

$target_path  = "../v8/pub/v/";
$randnum = rand(11111,99999);
$fName = "lacer".$randnum.".pdf";
$target_path = $target_path . basename($fName);

$backup_path = "backup/";

$resultArray = Array();

try{
    if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
        $b_path = $backup_path.basename($_FILES['file']['name']."pdf");
        copy($target_path,$b_path);
        $item = Array();
        $item["message"] = "Save Successfull";
        $item["code"] = $fName;
        $resultArray["meta"] = $item;

    } else {
        $item = Array();
        $item["message"] = "Unable to Upload Document";
        $item["code"] = 401;
        $resultArray["meta"] = $item;
    }
}
catch (Exception $x){
    $item = Array();
    $item["message"] = "Unable to Upload Document";
    $item["code"] = 401;
    $resultArray["meta"] = $item;
}

echo json_encode($resultArray,JSON_PRETTY_PRINT);
//if (is_uploaded_file($_FILES['uploadedfile']['tmp_name']))
//{
//
//    $name = $_FILES['uploadedfile']['name'];
//    $params = explode(".",$name);
//
//    $token = $params[1];
//    $userid = $params[0];
//    $filename = substr($userid,0,8).".jpg";
//    $tmpfile = $_FILES['uploadedfile']['tmp_name'];
//
//    // $sendfileresult = sendFile($token,$userid,$filename,$tmpfile);
//    // echo $sendfileresult;
//
//    echo "The file " .$params[0]. " and".$params[1]. " has been uploaded";
////  //now lets curl to usergrid
//// // print_r($HTTP_RAW_POST_DATA);
//// //print_r($_FILES['uploadedfile']);
//
//
////}
//else
//{
//    echo "There was an error uploading the file, please try again!";
//}