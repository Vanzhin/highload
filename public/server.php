<?php

use App\Services\ChatService;
use Ratchet\Server\IoServer;

require __DIR__.'/../vendor/autoload.php';

//require 'chat.php';

$server = IoServer::factory(
    new ChatService(),
    8181
);

$server->run();

