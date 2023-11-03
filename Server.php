<?php
    $host = "127.0.0.1";
    $port = 8080;
    $clint = array();

    // Create a TCP/IP socket
    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

    // Bind the socket to the address and port

    socket_bind($socket, $host, $port);

    // Start listening for connections
    socket_listen($socket);
    echo "Server listening on $host:$port\n";

    while(true){
        $user = socket_accept($socket);
        $name = socket_read($user , 1024);
        array_push($clint ,$name);
        massage($name , "$name is connected\n" , $user,$socket);    
    }

    
    function massage ($clint , $massage ,$user){
        echo "[SERVER]  :  " .$massage;
        while(true) {
            $massage = socket_read($user , 1024);
            if ($massage != null) {
                echo "[$clint] : " .$massage."\n";
            }
            else{
                exit(0);
            }
}
}


// Close the sockets
socket_close($socket);
?>
