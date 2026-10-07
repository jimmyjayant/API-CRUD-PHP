<?php
declare(strict_types=1);

// Namespaces
namespace App\Controllers;

// Packages
use GuzzleHttp\Psr7\Response;
Use GuzzleHttp\Psr7\Utils;


class HomeController
{
    public function index():Response
    {
        ob_start();

        require_once("../app/Views/crud/index.php");

        $content = ob_get_clean();

        $stream = Utils::streamFor($content);

        $response = new Response;

        $response = $response->withBody($stream);

        return $response;
    }
}
?>
