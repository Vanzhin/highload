<?php
require __DIR__ . '/../vendor/autoload.php';


use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;


$connection = new AMQPStreamConnection(
    'localhost', 5672, "highload", "xSc1jnBR6r8GW9gQgNvdKsVqGDqm5l"
);


try {
    $channel = $connection->channel();
    $channel->queue_declare('tea', false, false, false);
    $message = new AMQPMessage("black with milk");
    $channel->basic_publish($message, '', 'tea');
    $channel->close();
    $connection->close();
} catch (\PhpAmqpLib\Exception\AMQPProtocolChannelException|AMQPException $e) {
    echo $e->getMessage();
}

