<?php
/**
 * Created by Kweku kankam for AEON CONNECT.
 * LACER project
 * Date: 8/19/15
 * Time: 3:38 PM
 */
error_reporting(-1); // reports all errors
ini_set("display_errors", "1"); // shows all errors
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");

//Setup ActiveRecord Library
require_once 'libs/phpactiverecord/ActiveRecord.php';

ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_model_directory('models');
    $cfg->set_connections(
        array('development' => 'mysql://root:root@localhost/lacerdb'));
});

//first we get the Post data from our client
//and convert to Json String

$rawData = $HTTP_RAW_POST_DATA;

$data = json_decode($rawData);

//for testing lets echo our results

//echo "".$data->type." Id ". $data->id." Driver name ".$data->data->drivername ;

//We check for types
switch($data->type){
    case "GET":
    break;
    case "POST":
       addNewJudge($data);
    break;
    case "PUT":
    break;
    case "DELETE":
    break;
}

//if type is post lets add judge to db
function addNewJudge($data) {
   //now lets add our first record to our db
    $judge = Judge::create(array(
        'fullname' => 'Jason Dredd',
        'phone' => '0544456765',
        'phonealt' => '0549456765',
        'email' => 'jdredd@gmail.com',
        'address' => '5th nany Road , Cantoments',
        'created' => '345333',
        'modified' => '7664234',
    ));
 //echo $judge;
}