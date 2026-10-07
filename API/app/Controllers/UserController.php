<?php
declare(strict_types=1);

namespace App\Controllers;

use GuzzleHttp\Psr7\ServerRequest;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Utils;

class UserController
{
    public function index(ServerRequest $request, $args) : Response
    {
        $userID = $args['id'];

        ob_start();

        require_once("../app/Models/record.php");

        $content = ob_get_clean();

        $stream = Utils::streamFor($content);

        $response = new Response;
        $response = $response->withBody($stream);
        return $response;
    }

    public function update(ServerRequest $request, $args) : Response
    {
        $userID = $args['id'];

        ob_start();

        require_once("../app/Models/update.php");
        $content = ob_get_clean();

        $stream = Utils::streamFor($content);
        $response = new Response;
        $response = $response->withBody($stream);
        return $response;
    }

    public function delete(ServerRequest $request, $args) : Response
    {
        $userID = $args['id'];

        ob_start();

        require_once("../app/Models/delete.php");
        $content = ob_get_clean();

        $stream = Utils::streamFor($content);
        $response = new Response;
        $response = $response->withBody($stream);
        return $response;
    }
}
?>
