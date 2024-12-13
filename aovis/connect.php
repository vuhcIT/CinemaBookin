<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "da";
    $conn = new mysqli($server, $username, $password, $dbname);
    //kiem tra ket noi
    if($conn->connect_error){
        die("loi ket noi".$conn->connect_error);
    } 
    else {
        echo "";
    }
?>