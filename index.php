<?php
/**
 * Created by Kweku kankam for AEON CONNECT.
 * LACER project
 * Date: 8/28/15
 * Time: 2:45 PM
 */
error_reporting(-1); // reports all errors
ini_set("display_errors", "1"); // shows all errors
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");

// setup the autoloading
require_once 'vendor/autoload.php';

// setup Propel
require_once 'generated-conf/config.php';

require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

//Lets setup suits routes
$app->get('/suits',function() use($app){
    $appval = verifyToken();
    if($appval["retState"] == true){
        $app->render('suits/index.php');
    }else{
        $app->response()->status(401);
    }
    $app->response()->status(401);
});

$app->run();

function verifyToken() {
    //fist we get the authorization header
    $retVal = array("userid"=>"","retState"=>"");
    $headerarray = getallheaders();
    $authtoken = $headerarray["Authorization"];

    //next we verity in the token table
    $tokenCheck = TokenQuery::create()->findOneByToken($authtoken);
    if($tokenCheck == ""){
       $retVal["retState"] = false;
    }else{
        //check token expiration
        if($tokenCheck->getExpires()-time() > -1){
           $retVal["retState"] = false;
        }else{
            //lets get userid
            $retVal["userid"] = $tokenCheck->getUserid();
            $retVal["retState"] = true;
        }
    }
    return $retVal;
}