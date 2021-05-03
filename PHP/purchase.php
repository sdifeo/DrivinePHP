<?php

class purchase {
   
    private $purchase_uuid = "";
    private $customer_uuid = "";
    private $product_uuid = "";
    private $quantity = 0;
    private $price_at_purchase = 0;
    private $comments = "";
    private $date = "";
    private $subtotal = 0;
    private $taxes_amount = 0;
    private $grand_total = 0;
    
    //constructor
    function __construct($purchase_uuid = "", $customer_uuid = "", $product_uuid = "", $quantity = 0, $price_at_purchase = 0, $comments = "",
            $date = "", $subtotal = 0, $taxes_amount = 0, $grand_total = 0) {
        
        $this->setPurchaseUUID($purchase_uuid);
        $this->setCustomerUUID($customer_uuid);
        $this->setProductUUID($product_uuid);
        $this->setQuantity($quantity);
        $this->setPriceAtPurchase($price_at_purchase);
        $this->setComments($comments);
        $this->setDate($date);
        $this->setSubtotal($subtotal);
        $this->setTaxesAmount($taxes_amount);
        $this->setGrandTotal($grand_total);
                
    }
    
    //getters and setters
    public function getPurchaseUUID() {
        return $this->purchase_uuid;
        
    }
    
    public function setPurchaseUUID($newpurchaseuuid) {
        $this->purchase_uuid = $newpurchaseuuid;
        
    }
    
    public function getCustomerUUID() {
        return $this->customer_uuid;
        
    }
    
    public function setCustomerUUID($newcustomeruuid) {
        $this->customer_uuid = $newcustomeruuid;
        
    }
    
    public function getProductUUID()
    {
        return $this->product_uuid;
    }
    
    public function setProductUUID($newproductuuid)
    {
        $this->product_uuid = $newproductuuid;
    }
    
    public function getQuantity()
    {
        return $this->quantity;
    }
    
    public function setQuantity($newquantity)
    {
        $this->quantity = $newquantity;
    }
    
    public function getPriceAtPurchase()
    {
        return $this->price_at_purchase;
    }
    
    public function setPriceAtPurchase($newprice_at_purchase)
    {
        $this->price_at_purchase = $newprice_at_purchase;
    }
    
    public function getComments()
    {
        return $this->comments;
    }
    
    public function setComments($newcomments)
    {
        $this->comments = $newcomments;
    }
    
    public function getDate()
    {
        return $this->date;
    }
    
    public function setDate($newdate)
    {
        $this->date = $newdate;
    }
    
    public function getSubtotal()
    {
        return $this->subtotal;
    }
    
    public function setSubtotal($newsubtotal)
    {
        $this->subtotal =  $newsubtotal;
    }
    
    public function getTaxesAmount()
    {
        return $this->taxes_amount;
    }
    
    public function setTaxesAmount($newtaxesamount)
    {
        $this->taxes_amount = $newtaxesamount;
    }
    
    public function getGrandTotal()
    {
        return $this->grand_total;
    }
    
    public function setGrandTotal($newgrandtotal)
    {
        $this->grand_total = $newgrandtotal;
    }
    
    public function Load($purchase_uuid)
    {
        global $connection;
        
        $SQLQuery = "CALL purchases_selectOne(:purchase_uuid);";
        $PDOStatement = $connection->prepare($SQLQuery);
        $PDOStatement->bindparam(":purchase_uuid", $purchase_uuid);
        $PDOStatement->execute();
        
        if($row = $PDOStatement->fetch())
            {
                $this->purchase_uuid = $row["purchase_uuid"];
                $this->customer_uuid = $row["customer_uuid"];
                $this->product_uuid = $row["product_uuid"];
                $this->quantity = $row["quantity"];
                $this->price_at_purchase = $row["price_at_purchase"];
                $this->comments = $row["comments"];
                $this->date = $row["date"];
                $this->subtotal = $row["subtotal"];
                $this->taxes_amount = $row["taxes_amount"];
                $this->grand_total = $row["grand_total"];
                
            }
                                    
            $PDOStatement->closeCursor();
            $PDOStatement = null;
            $connection = null;
    }
    
    function save($username, $firstname, $lastname, $address, $city, $province, $postalCode, $password)
    {
        global $connection;
        
        $SQLQuery = "CALL customers_insert(:fname, :lname, :address, :city, :postalcode, :province, :uname, :pwd);";
        $PDOStatement = $connection->prepare($SQLQuery);      
        $PDOStatement->bindParam(":quantity", $_POST[$firstname]);
        $PDOStatement->bindParam(":price_at_purchase", $_POST[$lastname]);
        $PDOStatement->bindParam(":comments", $_POST[$address]);
        $PDOStatement->bindParam(":date", $_POST[$city]);
        $PDOStatement->bindParam(":subtotal", $_POST[$postalCode]);
        $PDOStatement->bindParam(":taxes_amount", $_POST[$province]);
        $PDOStatement->bindParam(":grand_total", $_POST[$username]);
        $PDOStatement->bindParam(":pwd", $_POST[$password]);
        
        $PDOStatement->execute();
        $PDOStatement = null;
        $connection->close();
                        
    }
    
    function delete($purchaseuuid)
    {
        global $connection;
        
        $SQLQuery = "CALL purchases_delete(:purchases_uuid);";
        $PDOStatement = $connection->prepare($SQLQuery);
        $PDOStatement->bindParam(":purchases_uuid", $purchaseuuid);
        
        $PDOStatement->execute();   
        $PDOStatement = null;
    }
}
