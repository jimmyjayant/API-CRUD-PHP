<?php
declare(strict_types=1);

namespace App\Controllers;

use GuzzleHttp\Psr7\Utils;
use GuzzleHttp\Psr7\Response;

class UsersController
{
    public function index() : Response
    {
        ob_start();
        require_once("../app/Models/read.php");
        $content = ob_get_clean();

        $stream = Utils::streamFor($content);

        $response = new Response;

        $response = $response->withBody($stream);

        return $response;
    }

    public function insert() : Response
    {
        ob_start();
        require_once("../app/Models/create.php");
        $content = ob_get_clean();

        $stream = Utils::streamFor($content);

        $response = new Response;
        $response = $response->withBody($stream);
        return $response;
    }
}
?>
