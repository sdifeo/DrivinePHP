<?php

#for singular product use
#need to implement the getters and setters
#and required methods

define("PRODCODE_MAX_LEN", 12);
define("PRODDESCT_MAX_LEN", 255);


require_once 'connection.php';

class product {
    
    private $product_uuid = "";
    private $product_code = "";
    private $product_description = "";
    private $price = 0;
    
    public function getProductUUID()
    {
        return $this->product_uuid;
    }
    
    public function getProductCode()
    {
        return $this->product_code;
    }
    
    public function setProductCode($newproductcode)
    {
        if (mb_strlen($newproductcode) == 0)
        {
            return "Product code cannot be empty";;
        }
        else 
        {
            if (mb_strlen($newproductcode) > PRODCODE_MAX_LEN)
            {
                return "Product code cannot be more than " . PRODCODE_MAX_LEN;
            }
            else
            {
                $this->product_code = $newproductcode;
            }
        }
    }
    
    public function getProductDescription()
    {
        return $this->product_description;
    }
    
    public function setProductDescription($newproddescription)
    {
        
        if (mb_strlen($newproddescription) > PRODDESCT_MAX_LEN)
        {
            return "Product description cannot be more than " . PRODDESCT_MAX_LEN;
        }
        else
        {
            $this->product_description = $newproddescription;
        }
    }
    
    public function getPrice()
    {
        return $this->price();
    }
    
    public function setPrice()
    {
        
    }
    
   function loadBuyPageDropDown()
   {
       global $connection;
       
       $SQLQuery = "CALL ";
   }
    
}
