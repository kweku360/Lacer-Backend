<?php
/**
 * Created by Kweku kankam for AEON CONNECT.
 * LACER project
 * Date: 8/19/15
 * Time: 3:38 PM
 */

//first we get the Post data from our client
//and convert to Json String
//echo $_SERVER['REQUEST_METHOD'];
$rawData = $HTTP_RAW_POST_DATA;

$data = json_decode($rawData);

//for testing lets echo our results

//echo "".$data->type." Id ". $data->id." Driver name ".$data->data->drivername ;

//if type is post lets add judge to db
function addNewJudge($data) {


}