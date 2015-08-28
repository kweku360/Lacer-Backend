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

require 'Slim/Slim.php';


\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

//Lets setup suits routes
