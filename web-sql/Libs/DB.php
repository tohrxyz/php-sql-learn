<?php
    $_DB = [
        "host" => "localhost",
        "login" => "root",
        "password" => "subzero",
        "name" => "hrib_db",
        "conn" => null,
    ];

    // Create connection
    $_DB["conn"] = mysqli_connect($_DB["host"], $_DB["login"], $_DB["password"], $_DB["name"]);
    
    // Check connection
    if(!$_DB["conn"]) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // echo "Connected successfully";
?>