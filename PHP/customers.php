<?php

require_once 'connection.php';
require_once 'collection.php';

class customers extends collection
{
    
function __construct() 
{
    $connection = new PDO("mysql:host=localhost;dbname=database-1934386", "root", "lasalle123");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $SQLQuery = "CALL customers_selectAll;";
    $PDOStatement = $connection->prepare($SQLQuery);
    $PDOStatement->execute();

    while($row = $PDOStatement->fetch())
    {
        $customer = new customer($row["customer_uuid"], $row["username"], $row["firstname"], $row["lastname"], $row["address"],
                $row["city"], $row["province"], $row["postal_code"], $row["u_password"]);          
        $this->add($row["customer_uuid"], $customer);

    }

    $PDOStatement = null;
    $connection = null; 
}    

}