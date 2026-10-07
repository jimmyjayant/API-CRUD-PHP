<?php

switch($httpMethod)
{
    case "GET":
        switch($getPage)
        {
            case "":
                require_once('../crud/index.php');
                break;

            case "api/users":
                require_once("../crud/read.php");
                break;

            case "api/user/":

        }
        break;

    case "POST":
        switch($getPage)
        {
            case "api/users":
                require_once("../crud/create.php");
                break;
        }
        break;

    case "PUT":
        switch($getPage)
        {
//
        }
        break;

    case "DELETE":
        switch($getPage)
        {
//
        }
        break;
}







?>
