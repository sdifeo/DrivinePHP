<?php

require_once 'connection.php';
require_once 'collection.php';
require_once 'product.php';

class products extends collection{
    
    function __construct() 
    {
        $connection = new PDO("mysql:host=localhost;dbname=database-1934386", "root", "lasalle123");
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $SQLQuery = "CALL products_selectAll;";
        $PDOStatement = $connection->prepare($SQLQuery);
        $PDOStatement->execute();
        
        while($row = $PDOStatement->fetch())
        {            
            $product = new product($row["product_uuid"], $row["product_code"], $row["product_description"], $row["price"]);          
            $this->add($row["product_uuid"], $product);
            
        }
        
        $PDOStatement = null;
        $connection = null;
    }
}