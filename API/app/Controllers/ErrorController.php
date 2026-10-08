<?php
declare(strict_types=1);

namespace App\Controllers;

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Utils;

class ErrorController
{
    public function index()
    {
        ob_start();
        require("../app/Views/errors/404.php");
        $content = ob_get_clean();

        $stream = Utils::streamFor($content);
        $response = new Response;
        $response = $response->withBody($stream);
        return $response;
    }
}
?>
