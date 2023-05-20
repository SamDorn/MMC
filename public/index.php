<?php
session_start();

require_once '../vendor/autoload.php';


use App\core\Application;
use App\controllers\SiteController;
use App\controllers\UserController;
use App\controllers\EvaluationController;
use App\utilities\Pdf;

$app = new Application(dirname(__DIR__));

/* These lines of code are defining the routes for the application using the GET method. Each route is
associated with a specific controller method that will handle the request and return the appropriate
response. For example, when a user navigates to the '/home' route, the 'home' method in the
'SiteController' class will be called to handle the request and return the appropriate response. */
$app->router->get('/', function(){
    header("Location: home");
});

$app->router->get('/home', [SiteController::class, 'home']);
$app->router->get('/aggiungi', [SiteController::class, 'add']);
$app->router->get('/login', [SiteController::class, 'login']);
$app->router->get('/visualizza', [SiteController::class, 'visualizza']);
$app->router->get('/modifica', [SiteController::class, 'modifica']);
$app->router->get('/pdf', [Pdf::class, 'generatePdf']);



/* These lines of code are defining the routes for the application using the POST method. Each route is
associated with a specific controller method that will handle the request and return the appropriate
response. For example, when a user submits a registration form, the 'addUser' method in the
'UserController' class will be called to handle the request and return the appropriate response.*/
$app->router->post('/trash', [UserController::class, 'checkUser']);
$app->router->post('/login', [UserController::class, 'checkUser']);
$app->router->post('/addEvaluation', [EvaluationController::class, 'addEvaluation']);
$app->router->post('/deleteEvaluation', [EvaluationController::class, 'deleteEvaluation']);
$app->router->post('/modifyEvaluation', [EvaluationController::class, 'modifyEvaluation']);



/* `->run();` is a method call that starts the application and handles the incoming HTTP request by
matching the requested URL with the defined routes and calling the appropriate controller method to
handle the request and return the response. */
$app->run();
