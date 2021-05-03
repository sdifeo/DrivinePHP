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
    
    function __construct($product_uuid = "", $product_code = "", $product_description = "", $price = 0) 
    {
        $this->setProductUUID($product_uuid);
        $this->setProductCode($product_code);
        $this->setProductDescription($product_description);
        $this->setPrice($price);
    }
    
    public function getProductUUID()
    {
        return $this->product_uuid;
    }
    
    public function setProductUUID($newproduuid)
    {
        $this->product_uuid = $newproduuid;
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
        return $this->price;
    }
    
    public function setPrice($newprice)
    {
        $this->price = $newprice;
    }
       
   function load($productuuid)
   {
        $connection = new PDO("mysql:host=localhost;dbname=database-1934386", "root", "lasalle123");
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
                
        $SQLQuery = "CALL products_selectOne(:productsSelect);";
        $PDOStatement = $connection->prepare($SQLQuery);
        $PDOStatement->bindparam(":productsSelect", $productuuid);
        $PDOStatement->execute();
        
        if($row = $PDOStatement->fetch())
            {
                $this->product_uuid = $row["product_uuid"];
                $this->product_code = $row["product_code"];
                $this->product_description = $row["product_description"];
                $this->price = $row["price"];
                #$this->address = $row["address"];
                
            }
                                    
            $PDOStatement->closeCursor();
            $PDOStatement = null;
            $connection = null;
   }
   
   function save($customer_uuid, $product_uuid, $price_at_purchase, $subtotal, $taxes_amount, $grand_total)
   {
        global $connection;
        
        $SQLQuery = "CALL purchases_insert(:customer_uid, :product_uuid, :quantity, :price_at_purchase, :comments, :subtotal, :taxes_amount, :grand_total);";
        $PDOStatement = $connection->prepare($SQLQuery);      
        $PDOStatement->bindParam(":customer_uid", $customer_uuid);
        $PDOStatement->bindParam(":product_uuid", $product_uuid);
        $PDOStatement->bindParam(":quantity", $_POST["quantity"]);
        $PDOStatement->bindParam(":price_at_purchase", $price_at_purchase);
        $PDOStatement->bindParam(":comments", $_POST["comments"]);
        $PDOStatement->bindParam(":subtotal", $subtotal);
        $PDOStatement->bindParam(":taxes_amount", $taxes_amount);
        $PDOStatement->bindParam(":grand_total", $grand_total);

        $PDOStatement->execute();
        $PDOStatement = null;
        $connection = null;
   }
   
   function save2()
   {
        global $connection;
        
        $SQLQuery = "CALL purchases_insert(:customer_uid, :product_uuid, :quantity, :price_at_purchase, :comments, :subtotal, :taxes_amount, :grand_total);";
        $PDOStatement = $connection->prepare($SQLQuery);      
        $PDOStatement->bindParam(":customer_uid", $customer_uuid);
        $PDOStatement->bindParam(":product_uuid", $product_uuid);
        $PDOStatement->bindParam(":quantity", $_POST["quantity"]);
        $PDOStatement->bindParam(":price_at_purchase", $price_at_purchase);
        $PDOStatement->bindParam(":comments", $_POST["comments"]);
        $PDOStatement->bindParam(":subtotal", $subtotal);
        $PDOStatement->bindParam(":taxes_amount", $taxes_amount);
        $PDOStatement->bindParam(":grand_total", $grand_total);

        $PDOStatement->execute();
        $PDOStatement = null;
        $connection = null;
   }
   
   function delete()
    {
        global $connection;
        
        $SQLQuery = "CALL products_delete(:purchases_uuid);";
        $PDOStatement = $connection->prepare($SQLQuery);
        $PDOStatement->bindParam(":purchases_uuid", $_POST["purchases_uuid"]);
        
        $PDOStatement->execute();   
        $PDOStatement = null;
    }
    
}
