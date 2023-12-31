<?php
error_reporting(E_ALL);

// Set unlimited execution time and disable the time limit
set_time_limit(0);

// Turn on implicit output flushing so we see what we're getting
ob_implicit_flush();

$address = '91.134.253.23';
$port = 8091;

// Create WebSocket
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_set_option($socket, SOL_SOCKET, SO_REUSEADDR, 1);
socket_bind($socket, $address, $port);
socket_listen($socket);

echo "Server started on {$address}:{$port}\n";

$clients = array($socket);

while (true) {
    $read = $clients;
    $write = $except = null;

    if (socket_select($read, $write, $except, 0) < 1) {
        continue;
    }

    if (in_array($socket, $read)) {
        $newSocket = socket_accept($socket);
        $clients[] = $newSocket;
        $key = array_search($socket, $read);
        unset($read[$key]);
    }

    foreach ($read as $client) {
        $data = @socket_read($client, 1024, PHP_BINARY_READ);

        if ($data === false) {
            $key = array_search($client, $clients);
            socket_close($client);
            unset($clients[$key]);
            echo "Client disconnected\n";
            continue;
        }

        $data = trim($data);

        if (!empty($data)) {
            echo "Received: {$data}\n";

            // Broadcast message to all connected clients
            foreach ($clients as $sendClient) {
                if ($sendClient != $socket && $sendClient != $client) {
                    socket_write($sendClient, $data, strlen($data));
                }
            }
        }
    }
}

// Close the master sockets
socket_close($socket);
