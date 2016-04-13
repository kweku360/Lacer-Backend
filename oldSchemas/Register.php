<?php
/**
 * Created by Kweku kankam for AEON CONNECT.
 * LACER project
 * Date: 8/20/15
 * Time: 4:25 AM
 */
http_response_code(200);
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


//We check for types
switch($data->type){
    case "GET":
        break;
    case "POST":
        registerNewUser($data);
        break;
    case "PUT":
        break;
    case "DELETE":
        break;
}
function registerNewUser($data){
    $date = new DateTime();

 //lets create our firstuser
    $user = User::create(array(
        'name' => 'Admin',
        'username' => 'Admin',
        'password' => 'django',
        'email' => 'admin@lacer.com',
        'status' => 'active',
        'picture' => 'none',
        'token' => bin2hex(openssl_random_pseudo_bytes(16)),
        'token_expire' => $date->getTimestamp(),
        'created' => $date->getTimestamp(),
        'modified' => $date->getTimestamp(),
    ));

    echo "user - ".$user->name." Created successfully";

}