<?php

    $connection = new PDO("mysql:host=localhost;dbname=database-1934386", "finalUser", "123");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
?>