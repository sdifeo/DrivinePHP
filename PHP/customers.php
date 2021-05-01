<?php

require_once 'connection.php';
require_once 'collection.php';

class customers extends collection
{
    
    function __construct() 
    {
        global $connection;
        
        $SQLQuery = "CALL customers_selectAll;";
        $PDOStatement->execute();
        
        while($row = $PDOStatement->fetch())
        {
            
        }
        
        
    }
    
}

