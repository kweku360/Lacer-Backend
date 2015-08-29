<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 8/26/15
 * Time: 9:17 AM
 */

class authtoken {


public function verifyToken($token){
    // setup the autoloading
    require_once 'vendor/autoload.php';

// setup Propel
    require_once 'generated-conf/config.php';

//setup token generator
    require_once 'libs/StringGenerator.php';

    //next we verity in the token table
    //$tokenCheck = TokenQuery::create()->findOneByToken($token);
    $tokenCheck = TokenQuery::create()->findById(1);
    return $tokenCheck->getId();
}

}