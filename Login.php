<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 8/20/15
 * Time: 4:25 AM
 */
error_reporting(-1); // reports all errors
ini_set("display_errors", "1"); // shows all errors
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");

//Setup ActiveRecord Library
require_once 'libs/phpactiverecord/ActiveRecord.php';
require 'libs/phppass/PasswordHash.php';

http_response_code(200);

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


//We check for types
switch($data->type){
    case "GET":
        break;
    case "POST":
        loginCheck($data);
        break;
    case "PUT":
        break;
    case "DELETE":
        break;
}

function loginCheck($data){
    //Step one - Hash password
    $hasher = new PasswordHash(8, FALSE);
    $passhash = $hasher->HashPassword($data->password);
    if (strlen($passhash) < 20)
        fail('Failed to hash new password');
    unset($hasher);

    echo "Welcome";

}