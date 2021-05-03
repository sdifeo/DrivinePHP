<?php

require_once 'connection.php';
require_once 'collection.php';

class purchases extends collection{
    
    //set the query inside constructor
    function __construct($customeruuid, $date = "") {
        
        //hardcoded connection again, cant seem to solve a bug with it
        $connection = new PDO("mysql:host=localhost;dbname=database-1934386", "root", "lasalle123");
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //do QUERY
        $SQLQuery = "CALL filter_purchases(:date, :customer_uuid);";
        $PDOStatement = $connection->prepare($SQLQuery);
        $PDOStatement->bindparam(":customer_uuid", $customeruuid);
        $PDOStatement->bindparam(":date", $date);
        $PDOStatement->execute();

        //so here, we're going to go through and "fetch" everything we need inside of purchases
        //all the relevant information
        while($row = $PDOStatement->fetch())
        {
            $purchase = new purchase($row["purchase_uuid"], $row["customer_uuid"], $row["product_uuid"], $row["quantity"], $row["price_at_purchase"],
                    $row["comments"], $row["date"], $row["subtotal"], $row["taxes_amount"], $row["grand_total"]);         
            //then simply just add it to our collection
            $this->add($row["purchase_uuid"], $purchase);
            
        }

        $PDOStatement = null;
        $connection = null;
        }
}
