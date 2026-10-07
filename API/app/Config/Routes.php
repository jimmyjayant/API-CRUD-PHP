<?php
declare(strict_types=1);




// Include composer autoloader
require_once "../vendor/autoload.php";




// Packages
use GuzzleHttp\Psr7\ServerRequest;
use GuzzleHttp\Psr7\Response;
use League\Route\Router;
use HttpSoft\Emitter\SapiEmitter;




// Controllers
use App\Controllers\HomeController;
use App\Controllers\UsersController;
use App\Controllers\UserController;
use App\Controllers\APIController;




// Creating the request object
$request = ServerRequest::fromGlobals();

// $path = $request->getUri()->getPath();
// echo $path;



// Creating the router instance
$router = new Router;

// Defining routes


// GET Requests

// Homepage
$router->get("/", [HomeController::class, 'index']);


// Fetch all users from apidatatable
$router->get('/api/users', [UsersController::class, 'index']);

// Get a particular user record data
$router->get('/api/users/{id:number}', [UserController::class, "index"]);


// Fetching API Data (Made By Clients through CURL)
$router->get('/users', [APIController::class, 'index']);


// POST Requests

// Insert new user data
$router->post("/api/users", [UsersController::class, 'insert']);



// PUT Requests

// Update user data
$router->put("/api/users/{id:number}", [UserController::class, 'update']);



// DELETE Requests

// Delete user data
$router->delete("/api/users/{id:number}", [UserController::class, 'delete']);


// 404 Error Page


// Match routes to request
$response = $router->dispatch($request);

// Check if the route exists for a particular request without executing the respective controller
// $result = $router->match($request);

// if($result->isFound())
// {
//     // echo "found";
//     $route = $result->getRoute();
// }
// else
// {
//     echo "not found";
// }

// Emitting or echoing response
$emitter = new SapiEmitter;
$emitter->emit($response);

?>
