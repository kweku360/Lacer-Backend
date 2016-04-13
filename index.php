<?php
/**
 * Created by Kweku kankam for KFIVE.
 * ABOOKER project
 * Date: 12/11/15
 * Time: 10:33 PM
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

//Lets setup suits routes API

/**
Endpoint - '/users/token'
Verb - POST
server function - '/users/gettoken.php'
gets the token based ona valid username and password
**/
//user
$app->post('/users/token',function() use($app){
    $allPostVars = $app->request->post();
    $app->render('users/gettoken.php',array('vars'=>$allPostVars));
});

/**
Endpoint - '/suits/id'
Verb - GET
server function - '/suits/show.php'
retrieves a single suit
**/
$app->get('/suits/:id',function($id) use($app){

        $app->render('suits/show.php',array('id' => $id));
});

/**
Endpoint - '/suits'
Verb - POST
server function - '/suits/create'
creates a single suit
**/
$app->options('/suits',function(){});
$app->post('/suits',function() use($app){
    $allPostVars = $app->request->post();
    $app->render('suits/create.php',
        array('vars'=>$allPostVars)
    );
});
/**
Endpoint - '/suits/id'
Verb - PUT
server function - '/suits/update/.php'
updates a single suit
**/
$app->options('/suits/:id',function(){});
$app->put('/suits/:id',function($id) use($app){
        $allPutVars = $app->request->put();
     
        $app->render('suits/update.php',
            array('id' => $id,'vars'=>$allPutVars)
        );
});
/**
Endpoint - '/suits/authorize/:id'
Verb - PUT
server function - '/suits/authorize.php'
Authorizes a single suit
**/
$app->options('/suits/authorize/:id',function(){});
$app->put('/suits/authorize/:id',function($id) use($app){
        $allPutVars = $app->request->put();
        $app->render('suits/authorize.php',
            array('id' => $id,'vars'=>$allPutVars)
        );
});
/**
Endpoint - '/suits/:id'
Verb - DELETE
server function - '/suits/delete.php'
deletes a single suit
**/
$app->delete('/suits/:id',function($id) use($app){
    $appval = verifyToken();
    if($appval["retState"] == true){
        $app->render('suits/delete.php',array('id' => $id));
    }else{
        $app->response()->status(401);
    }
});


$app->post('/users/new',function() use($app){
    $allPostVars = $app->request->post();
    $app->render('users/new.php',array('vars'=>$allPostVars));
});
$app->post('/users/adminnew',function() use($app){
    $allPostVars = $app->request->post();
    $app->render('users/adminnew.php',array('vars'=>$allPostVars));
});
$app->get('/users/showAdminUsers',function() use($app){
    $allPostVars = $app->request->post();
    $app->render('users/showAdminUsers.php',array('vars'=>$allPostVars));
});
$app->options('/users/:id',function(){});
$app->put('/users/:id',function($id) use($app){
    $allPutVars = $app->request->put();
    $app->render('users/update.php',
        array('id' => $id,'vars'=>$allPutVars)
    );
});
$app->post('/users/regcode',function() use($app){
    $allPostVars = $app->request->post();
    $app->render('users/saveregcode.php',array('vars'=>$allPostVars));
});
$app->get('/users/regcode/:id',function($id) use($app){
    $allPostVars = $app->request->post();
    $app->render('users/checkregcode.php',array('id' => $id));
});

//Permissions
/**
Endpoint - '/permission'
Verb - POST
server function - '/permissions/create.php'
creates a single permission
**/
$app->options('/permission',function(){}); //pre-flight
$app->post('/permission',function() use($app){
    $allPostVars = $app->request->post();

    $app->render('permissions/create.php',
        array('vars'=>$allPostVars)
    );
});
/**
Endpoint - '/permission/:id'
Verb - GET
server function - '/permissions/showAllByUser.php'
retrieves all permissions based on the User ID
**/
$app->get('/permission/:id',function($id) use($app){
    $allPostVars = $app->request->post();
    $app->render('permissions/showallbyuser.php',
        array('id' => $id)
    );
});

/**
Endpoint - '/permission/:id'
Verb - PUT
server function - '/permissions/update.php'
updates permissions based on the  ID
**/
$app->options('/permission/:id',function(){});
$app->PUT('/permission/:id',function($id) use($app){
    $allPutVars = $app->request->put();

    $app->render('permissions/update.php',
        array('id' => $id,'vars'=>$allPutVars)
    );
});


//plaintiffs

$app->options('/plaintiffs',function(){});
//create new
$app->post('/plaintiffs',function() use($app){
    $allPostVars = $app->request->post();

    $app->render('plaintiffs/create.php',
        array('vars'=>$allPostVars)
    );
});
//get one
$app->options('/plaintiffs',function(){});
$app->get('/plaintiffs/:id',function($id) use($app){
    $allPostVars = $app->request->post();

    $app->render('plaintiffs/show.php',
        array('id' => $id)
    );
});
//update one
$app->options('/plaintiffs/:id',function(){});
$app->put('/plaintiffs/:id',function($id) use($app){
    $allPutVars = $app->request->put();
    $app->render('plaintiffs/update.php',
        array('id' => $id,'vars'=>$allPutVars)
    );
});
//delete one
$app->options('/plaintiffs/:id',function(){});
$app->delete('/plaintiffs/:id',function($id) use($app){
    $app->render('plaintiffs/delete.php',
        array('id' => $id)
    );
});


//defendants
$app->options('/defendants',function(){});
//new
$app->post('/defendants',function() use($app){
    $allPostVars = $app->request->post();

    $app->render('defendants/create.php',
        array('vars'=>$allPostVars)
    );
});
//get one
$app->options('/defendants',function(){});
$app->get('/defendants/:id',function($id) use($app){
    $allPostVars = $app->request->post();

    $app->render('defendants/show.php',
        array('id' => $id)
    );
});
//update one
$app->options('/defendants/:id',function(){});
$app->put('/defendants/:id',function($id) use($app){
    $allPutVars = $app->request->put();
    $app->render('defendants/update.php',
        array('id' => $id,'vars'=>$allPutVars)
    );
});
//delete one
$app->options('/defendants/:id',function(){});
$app->delete('/defendants/:id',function($id) use($app){
    $app->render('defendants/delete.php',
        array('id' => $id)
    );
});

//Suit Lawyers
//new
$app->options('/suitlawyers',function(){});
$app->post('/suitlawyers',function() use($app){
    $allPostVars = $app->request->post();

    $app->render('suitlawyers/create.php',
        array('vars'=>$allPostVars)
    );
});
//get one
$app->options('/suitlawyers/:id',function(){});
$app->get('/suitlawyers/:id',function($id) use($app){
    $allPostVars = $app->request->post();

    $app->render('suitlawyers/show.php',
        array('id' => $id)
    );
});
//get user suits
$app->options('/usersuits/:id',function(){});
$app->get('/usersuits/:id',function($id) use($app){
    $allPostVars = $app->request->post();

    $app->render('suitlawyers/showUserSuits.php',
        array('id' => $id)
    );
});
//update one
$app->options('/suitlawyers/:id',function(){});
$app->put('/suitlawyers/:id',function($id) use($app){
    $allPutVars = $app->request->put();
    $app->render('suitlawyers/update.php',
        array('id' => $id,'vars'=>$allPutVars)
    );
});
//delete one
$app->options('/suitlawyers/:id',function(){});
$app->delete('/suitlawyers/:id',function($id) use($app){
    $app->render('suitlawyers/delete.php',
        array('id' => $id)
    );
});

//Suit Judges
//new
$app->options('/suitjudges',function(){});
$app->post('/suitjudges',function() use($app){
    $allPostVars = $app->request->post();

    $app->render('suitjudges/create.php',
        array('vars'=>$allPostVars)
    );
});
//get by id
$app->options('/suitjudges/:id',function(){});
$app->get('/suitjudges/:id',function($id) use($app){
    $allPostVars = $app->request->post();

    $app->render('suitjudges/show.php',
        array('id' => $id)
    );
});
//update by id
$app->options('/suitjudges/:id',function(){});
$app->put('/suitjudges/:id',function($id) use($app){
    $allPutVars = $app->request->put();
    $app->render('suitjudges/update.php',
        array('id' => $id,'vars'=>$allPutVars)
    );
});
//delete by id
$app->options('/suitjudges/:id',function(){});
$app->delete('/suitjudges/:id',function($id) use($app){
    $app->render('suitjudges/delete.php',
        array('id' => $id)
    );
});

// Lawyers
$app->options('/lawyers',function(){});
$app->post('/lawyers',function() use($app){
    $allPostVars = $app->request->post();

    $app->render('lawyers/create.php',
        array('vars'=>$allPostVars)
    );
});
$app->options('/lawyers',function(){});
$app->get('/lawyers',function() use($app){
//    $appval = verifyToken();
//    if($appval["retState"] == true){
        $app->render('lawyers/showall.php');
//    }else{
//        $app->response()->status(401);
//    }

});
//update by id
$app->options('/lawyers/:id',function(){});
$app->put('/lawyers/:id',function($id) use($app){
    $allPutVars = $app->request->put();
    //var_dump($allPutVars);
    $app->render('lawyers/update.php',
        array('id' => $id,'vars'=>$allPutVars)
    );
});
//delete by id
$app->options('/lawyers/:id',function(){});
$app->delete('/lawyers/:id',function($id) use($app){
    $app->render('lawyers/delete.php',
        array('id' => $id)
    );
});

//unregistered
$app->options('/unregisteredlawyers',function(){});
$app->post('/unregisteredlawyers',function() use($app){
    $allPostVars = $app->request->post();

    $app->render('lawyers/createunregistered.php',
        array('vars'=>$allPostVars)
    );
});
// Judges
$app->options('/suitlawyers',function(){});
$app->post('/suitlawyers',function() use($app){
    $allPostVars = $app->request->post();

    $app->render('suitlawyers/create.php',
        array('vars'=>$allPostVars)
    );
});
//update by id
$app->options('/judges/:id',function(){});
$app->put('/judges/:id',function($id) use($app){
    $allPutVars = $app->request->put();
    //var_dump($allPutVars);
    $app->render('judges/update.php',
        array('id' => $id,'vars'=>$allPutVars)
    );
});
$app->options('/judges',function(){});
$app->get('/judges',function() use($app){
//    $appval = verifyToken();
//    if($appval["retState"] == true){
        $app->render('judges/showall.php');
//    }else{
//        $app->response()->status(401);
//    }

});
$app->options('/judges',function(){});
$app->post('/judges',function() use($app){
//    $appval = verifyToken();
//    if($appval["retState"] == true){
    $allPostVars = $app->request->post();

    $app->render('judges/create.php',
        array('vars'=>$allPostVars)
    );
//    }else{
//        $app->response()->status(401);
//    }

});

//documents
$app->options('/documents',function(){});
$app->post('/documents',function() use($app){
    $allPostVars = $app->request->post();

    $app->render('documents/create.php',
        array('vars'=>$allPostVars)
    );
});
$app->options('/documents/:id',function(){});
$app->get('/documents/:id',function($id) use($app){
    $allPostVars = $app->request->post();

    $app->render('documents/show.php',
        array('id' => $id)
    );
});
//documents
$app->options('/documents',function(){});
$app->post('/documents',function() use($app){
    $allPostVars = $app->request->post();

    $app->render('documents/create.php',
        array('vars'=>$allPostVars)
    );
});
$app->options('/documents/:id',function(){});
$app->put('/documents/:id',function($id) use($app){

        $allPutVars = $app->request->put();
        $app->render('documents/update.php',
            array('id' => $id,'vars'=>$allPutVars)
        );

});

//Notifications
$app->options('/notifications',function(){});
$app->post('/notifications',function() use($app){
    $allPostVars = $app->request->post();

    $app->render('notifications/create.php',
        array('vars'=>$allPostVars)
    );
});
$app->options('/notifications/:id',function(){});
$app->get('/notifications/:id',function($id) use($app){
    $allPostVars = $app->request->post();

    $app->render('notifications/show.php',
        array('id' => $id)
    );
});
$app->options('/smssender',function(){});
$app->post('/smssender',function() use($app){
    $allPostVars = $app->request->post();
//    var_dump($allPostVars);
    $app->render('notifications/sendsms.php',
        array('vars'=>$allPostVars)
    );
});
$app->options('/notifications/:id',function(){});
$app->put('/notifications/:id',function($id) use($app){

    $allPutVars = $app->request->put();
    $app->render('notifications/update.php',
        array('id' => $id,'vars'=>$allPutVars)
    );

});

//Notification Details
$app->options('/notificationdetail',function(){});
$app->post('/notificationdetail',function() use($app){
    $allPostVars = $app->request->post();

    $app->render('notificationdetail/create.php',
        array('vars'=>$allPostVars)
    );
});
$app->options('/notificationdetail/:id',function(){});
$app->get('/notificationdetail/:id',function($id) use($app){
    $allPostVars = $app->request->post();
    $app->render('notificationdetail/show.php',
        array('id' => $id)
    );
});
$app->options('/smssender',function(){});
$app->post('/smssender',function() use($app){
    $allPostVars = $app->request->post();
//    var_dump($allPostVars);
    $app->render('notificationdetail/sendsms.php',
        array('vars'=>$allPostVars)
    );
});
$app->options('/notificationdetail/:id',function(){});
$app->put('/notificationdetail/:id',function($id) use($app){

    $allPutVars = $app->request->put();
    $app->render('notificationdetail/update.php',
        array('id' => $id,'vars'=>$allPutVars)
    );

});


//User Suits
$app->options('/usercases/:id',function(){});
$app->get('/usercases/:id',function($id) use($app){
    $allPostVars = $app->request->post();

    $app->render('suits/usercases.php',
        array('id' => $id)
    );
});

//Auth checker
$app->options('/auth',function(){});
$app->get('/auth',function() use($app){
     $appval = verifyToken();
     if($appval["retState"] == true){
         $app->response()->status(200);
    }else{
        $app->response()->status(401);
    }
});


$app->run();


function verifyToken() {
    //fist we get the authorization header
    $retVal = array("userid"=>"","retState"=>"");
    $headerarray = getallheaders();
    try{ $authtoken = $headerarray["Authorization"];}catch (Exception $x){
        $authtoken = "";
    }

var_dump($authtoken);
    //next we verity in the token table 
    $tokenCheck = TokenQuery::create()->findOneByToken($authtoken);
    if($tokenCheck == ""){
        echo "false value returned";
       $retVal["retState"] = false;
    }else{
        //check token expiration
        if($tokenCheck->getExpires()-time() < 0){
            echo $tokenCheck->getExpires()."<br>";
            echo time()."<br>";
            echo $tokenCheck->getExpires()-time()."<br>";
           $retVal["retState"] = false;
        }else{
            //lets get userid
            $retVal["userid"] = $tokenCheck->getUserid();
            $retVal["retState"] = true;
        }
    }
    return $retVal;
}
