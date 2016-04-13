<?php
/**
 * Created by Kweku kankam for AEON CONNECT.
 * LACER project
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

$app->get(

    '/',function(){getAllDefendants();}
);
$app->get(

    '/:id',function($id){getDefendant($id);}
);

$app->post(

    '/',function(){saveNewDefendant();}
);
$app->post(

    '/:id',function($id){updateDefendant($id);}
);
$app->put(

    '/:id',function($id){updateDefendant($id);}
);
$app->delete(

    '/:id',function($id){deleteDefendant($id);}
);
$app->delete(
    '/',function(){deleteAllDefendant();}
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

function getAllDefendants(){
    $defendants = DefendantsQuery::create()->find();
    foreach($suits as $suit) {
        echo $suit->getSuitnumber();
    }

}

function getDefendant($id){
    $defendants = DefendantsQuery::create()->findById($id);

}

function saveNewDefendant(){



}
function updateSuit($id){
    echo "Updating Suit " .$id;
}
function deleteSuit($id){
    echo "Deleting Suit " .$id;
}
function deleteAllSuit(){
    echo "Deleting Suit ";
}
