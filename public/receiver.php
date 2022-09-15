<?php
require __DIR__ . '/../vendor/autoload.php';


use PhpAmqpLib\Connection\AMQPStreamConnection;


$connection = new AMQPStreamConnection(
    'localhost', 5672, "highload", "xSc1jnBR6r8GW9gQgNvdKsVqGDqm5l"
);


try {
    $channel = $connection->channel();
    $channel->queue_declare('tea', false, false, false);
    echo " [*] Waiting for messages. To exit press CTRL+C\n";

    $callback = function ($msg) {
        echo ' [x] Received ', $msg->body, "\n";
    };

    $channel->basic_consume('tea', '', false, true, false, false, $callback);

    while ($channel->is_open()) {
        $channel->wait();
    }
} catch (\PhpAmqpLib\Exception\AMQPProtocolChannelException|AMQPException $e) {
    echo $e->getMessage();
}
