<?php
/**
 * Created by Kweku kankam for AEON CONNECT.
 * LACER project
 * Date: 8/26/15
 * Time: 3:08 AM
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

require 'Slim/Slim.php';


\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

$app->post(

    '/token', function () {
    getToken();
}
);
$app->post(
//create new user
    '/', function () {
    createUser();
}
);
$app->post(
//create new user
    '/changepassword/:id', function ($id) {
    changePassword($id);
}
);

$app->put(

    '/userss/:id', function ($id) {
    updateUser($id);
}
);
$app->delete(

    '/:id', function ($id) {
    deleteUser($id);
}
);


$app->run();

function verifyToken() {
    //fist we get the authorization header
    $retVal = array("userid"=>"","retState"=>"");
    $headerarray = getallheaders();
    $authtoken = $headerarray["Authorization"];

    //next we verity in the token table
    $tokenCheck = TokenQuery::create()->findOneByToken($authtoken);
    if($tokenCheck == ""){
        echo "invalid token";
        $retVal["retState"] = false;
    }else{
        //check token expiration
        if($tokenCheck->getExpires()-time() > -1){
            echo "token expired";
            $retVal["retState"] = false;
        }else{
            //lets get userid
            $retVal["userid"] = $tokenCheck->getUserid();
            $retVal["retState"] = true;
        }
    }
    return $retVal;
}

function createUser()
{
    //first check if user exists already
    $userCheck = UsersQuery::create()->findOneByUsername($_POST['username']);
    if ($userCheck == "") {
        // next add user to db
        $user = new Users();
        $user->setUsername($_POST['username']);
        $user->setPassword($_POST['password']);
        $user->setName($_POST['name']);
        $user->setEmail($_POST['email']);
        $user->setStatus("active");
        $user->setPicture("none");
        $user->setCreated(time());
        $user->setModified(time());

        $user->save();

        if ($user != null) {
            echo "user added successfully";
        }
    } else {
        echo "user already registered";
    }
}

function getToken()
{
    //lets hash password

    //first we check if username is valid
    $userCheck = UsersQuery::create()->findOneByUsername($_POST['username']);
    if ($userCheck == "") {
        echo "invalid username";

    } else {
        if ($userCheck->getPassword() != $_POST['password']) {
            echo "invalid password";
        } else {
            //password valid - generate token and return it
            $userToken = new Token();
            $userToken->setSelector(StringGenerator::randomId());
            $userToken->setToken(StringGenerator::randomAlnum(32));
            $userToken->setUserid($userCheck->getId());
            $userToken->setExpires(time() + 24 * 60 * 60);
            $userToken->setCreated(time());
            $userToken->setModified(time());

            $userToken->save();
            if ($userToken != null) {
                echo $userToken->getToken();
            }
        }
    }

}

function updateUser($id){
    echo $id;
    $appval = verifyToken();
   if($appval["retState"] == true){
        //lets get user from token
       $userVal = UsersQuery::create()->findById($appval["userid"]);

       if($_POST['username'] != null){
           $userVal->setUsername($_POST['username']);
       }
       if($_POST['name'] != null){
           $userVal->setUsername($_POST['name']);
       }
        if($_POST['email'] != null){
           $userVal->setUsername($_POST['email']);
       }


   }else{
       header('HTTP/1.1 401 Unauthorized', true, 401);
       echo "authentication failed";
   };
}
