<?php

define('BASE_DIR', '/Projects/PHP/API_CRUD_PHP/API/');

$uri = $_SERVER['REQUEST_URI'];

// var_dump($uri);

// $url = str_replace(BASE_DIR, "", $uri);
// echo "<br>";
// var_dump($uri);

$httpMethod = $_SERVER['REQUEST_METHOD'];

// echo "<br>". $httpMethod;

$getPage = isset($_GET['url']) ? $_GET['url'] : "";

// echo $getPage;

require_once("../routes/api.php");




?>
