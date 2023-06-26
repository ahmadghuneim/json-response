<?php

require_once __DIR__ . "/vendor/autoload.php";

use App\JsonResponse;

new JsonResponse("exception", "", [
    "name" => "Ahmad"
]);
