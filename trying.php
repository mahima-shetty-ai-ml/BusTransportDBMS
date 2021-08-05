<?php 
    $server = "localhost";
    $user = "root";
    $pass = "";

    $con = mysqli_connect($server, $user, $pass);

    if(!$con){
        die("connection failed");
    }
    echo "successfully connected";
    

?>