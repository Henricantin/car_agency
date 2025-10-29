<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "car_agency";

    $conn = new mysqli($host, $user, $pass, $dbname);

    if ($conn->connect_error) {
        die("Conexão perdida: " . $conn->connect_error);
    }
?>