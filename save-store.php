<?php
    $name = $_REQUEST["name"];
    $location = $_REQUEST["location"];
    $phone = $_REQUEST["phone"];

    // Connect database
    $host = "localhost";
    $dbname = "store";
    $username = "root";
    $password = "";

    $con = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    //Build sentence SQL
    $sql = "INSERT INTO create_store (id, name, location, phone) VALUES (NULL, '$name', '$location', '$phone')";

    //Prepare sentence SQL
    $p = $con->prepare($sql);

    //Execute SQL sentence
    $result = $p->execute();

    if($result){
        echo "Store created succesfully";
    }
    else{
        echo "There is an error";
    }
?>