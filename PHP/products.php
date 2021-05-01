<?php

require_once 'connection.php';
require_once 'collection.php';
require_once 'product.php';

class products extends collection{
    
    function __construct() 
    {
        global $connection;
        
        $SQLQuery = "CALL products_selectAll;";
        $PDOStatement = $connection->prepare($SQLQuery);
        $PDOStatement->execute();
        
        while($row = $PDOStatement->fetch())
        {
            $prod = new product($row["product_uuid"], $row["product_code"], $row["product_description"], $row["price"]);          
            $this->add($row["product_uuid"], $prod);
            
        }
    
    }
}