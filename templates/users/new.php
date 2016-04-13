<?php
/**
 * Created by Kweku kankam for AEON CONNECT.
 * LACER project
 * Date: 8/31/15
 * Time: 8:37 AM
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

$userCheck = UsersQuery::create()->findOneByPhone($this->data["vars"]["phone"]);
$resultArray = Array();

if ($userCheck == "") {

        $user = new Users();
        $user->setPhone($this->data["vars"]["phone"]);
        $user->setPassword($this->data["vars"]["password"]);
        $user->setPosition($this->data["vars"]["position"]);
        $user->setEmailcode($this->data["vars"]["emailcode"]);
        $user->setName($this->data["vars"]["fullname"]);
        $user->setEmail($this->data["vars"]["email"]);
        $user->setStatus("active");
        $user->setPicture("none");
        $user->setCreated(time());
        $user->setModified(time());

        $user->save();

        if ($user != null) {

            //lets create a lawyer or a judge or a registrar :)
            if($user->getPosition() == "Lawyer"){
                $newLawyer = new Lawyers();
                try{$newLawyer->setLawyerid($this->data["vars"]["phone"]);}catch (Exception $x){}
                try{$newLawyer->setFullname($this->data["vars"]["fullname"]);}catch (Exception $x){}
                try{$newLawyer->setPhone1($this->data["vars"]["phone"]);}catch (Exception $x){}
                try{$newLawyer->setEmail($this->data["vars"]["email"]);}catch (Exception $x){}
                try{$newLawyer->setStatus("active");}catch (Exception $x){}

                try{$newLawyer->setCreated(time());}catch (Exception $x){}
                try{$newLawyer->setModified(time());}catch (Exception $x){}

                $newLawyer->save();
            }
            if($user->getPosition() == "Judge"){
                $newJudge = new Judges();
                try{$newJudge->setJudgeid($this->data["vars"]["phone"]);}catch (Exception $x){}
                try{$newJudge->setFullname($this->data["vars"]["fullname"]);}catch (Exception $x){}
                try{$newJudge->setEmail($this->data["vars"]["email"]);}catch (Exception $x){}
                try{$newJudge->setPhone1($this->data["vars"]["phone"]);}catch (Exception $x){}
                try{$newJudge->setStatus("active");}catch (Exception $x){}

                try{$newJudge->setCreated(time());}catch (Exception $x){}
                try{$newJudge->setModified(time());}catch (Exception $x){}
                $newJudge->save();
            }
            $item = Array();
            $item["message"] = "Success";
            $item["code"] = $user->getId();
            $resultArray["meta"] = $item;

        }

} else {
    $item = Array();
    $item["message"] = "User Registered";
    $item["code"] = "422";
    $resultArray["meta"] = $item;

}

function saveLawyer($this){

}
function saveJudge(){

}

echo json_encode($resultArray,JSON_PRETTY_PRINT);