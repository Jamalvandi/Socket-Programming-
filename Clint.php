<?php
$host = "127.0.0.1";
$port = 8080;
$name = readline("Enter Your name : ");

// Create a TCP/IP socket
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

// Connect to the server
socket_connect($socket, $host, $port);

// Send data to the server
socket_write($socket, $name, strlen($name));
// Send massage 
while (true){
    $massage = readline("Enter Massage :");
    if ($massage != null) {
       if ($massage ==="!Disconnect!") {
        echo "[REAVER] : $name Disconnect";
        socket_write($socket  , $massage, strlen($massage));
        exit(0);
    }
    socket_write($socket  , $massage, strlen($massage)); 
    }else {
        exit(0);
    }
    
}

// Read the response from the server
// $input = socket_read($socket, 1024);

// echo "Received from server: $input\n";

// Close the socket
socket_close($socket);
?>
