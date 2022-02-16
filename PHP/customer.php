<?php
#REVISION HISTORY
#LAST WORKED ON: APRIL 26, 2021
#
#CREATED getters and setters....
#also created methods
#
?>

<?php

define ("PRODUCTCODE_MAX_LEN", 12);
define("USERNAME_MAX_LEN", 12);
define("FIRSTNAME_MAX_LEN", 20);
define("LASTNAME_MAX_LEN", 20);
define("ADDRESS_MAX_LEN", 25);
define("CITY_MAX_LEN", 25);
define("PROVINCE_MAX_LEN", 25);
define("POSTALCODE_MAX_LEN", 7);
define("PASSWORD_MAX_LEN", 255);

require_once "connection.php";

session_start();
$_SESSION["firstname"] = "";

class customer
{
    private $customer_uuid = "";
    private $username = "";
    private $firstname = "";
    private $lastname = "";
    private $address = "";
    private $city = "";
    private $province = "";
    private $postalcode = "";
    private $password = "";
    private $dateCreated;
    
    #creating constructor - called every time we instantiate an object
    function __construct($newUsername="", $newFirstname="", $newLastname="", $newAddress="", $newCity="", $newProvince="", $newPostalcode="", $new_Password="") 
    {
        
        $this->setUsername($newUsername);
        $this->setFirstname($newFirstname);
        $this->setLastname($newLastname);
        $this->setAddress($newAddress);
        $this->setCity($newCity);
        $this->setProvince($newProvince);
        $this->setPostalCode($newPostalcode);
        $this->setPassword($new_Password);
    }
    
    
    #creating getters and setters
    public function setusername($newusername)
    {
        $this->username = $newusername;
    }
    
    public function setfirstname($newfirstname)
    {
        if(mb_strlen($newfirstname) > FIRSTNAME_MAX_LEN)
        {
            return "Cannot enter more than " . FIRSTNAME_MAX_LEN;
        }
        else
        {
            $this->firstname = $newfirstname;
        }
        
    }
    
    public function setlastname($newlastname)
    {
        if(mb_strlen($newlastname) > LASTNAME_MAX_LEN)
        {
            return "Cannot enter more than " . LASTNAME_MAX_LEN;
        }
        else
        {
            $this->lastname = $newlastname;
        }
       
    }
    
    public function setaddress($newaddress)
    {
        if(mb_strlen($newaddress) > ADDRESS_MAX_LEN)
        {
            return "Cannot enter more than " . ADDRESS_MAX_LEN;
        }
        else
        {
            $this->address = $newaddress;
        }
        
    }
    
    public function setcity($newcity) 
    {
        if(mb_strlen($newcity) > CITY_MAX_LEN)
        {
            return "Cannot enter more than " . CITY_MAX_LEN;
        }
        else
        {
            $this->city = $newcity;
        }
        
    }
    
    public function setprovince($newprovince)
    {
        if(mb_strlen($newprovince) > PROVINCE_MAX_LEN)
        {
            return "Cannot enter more than " . PROVINCE_MAX_LEN;
        }
        else
        {
            $this->province = $newprovince;
        }
        
    }
    
    public function setpostalcode($newpostalcode)
    {
        if(mb_strlen($newpostalcode) > POSTALCODE_MAX_LEN)
        {
            return "Cannot enter more than " . POSTALCODE_MAX_LEN;
        }
        else
        {
            $this->postalcode = $newpostalcode;
        }
       
    }
    
    public function setpassword($newpassword)
    {
        if(mb_strlen($newpassword) > PASSWORD_MAX_LEN)
        {
            return "Cannot enter more than " . PASSWORD_MAX_LEN;
        }
        else
        {
            $this->password = $newpassword;
        }
    }
    
    public function getcustomeruuid()
    {
        return $this->customer_uuid;
    }
    
    public function getusername()
    {
        return $this->username;
    }
    
    public function getfirstname()
    {
        return $this->firstname;
    }
    
    public function getlastname()
    {
        return $this->lastname;
    }
     
    public function getaddress()
    {
        return $this->address;
    }
    
    public function getcity()
    {
        return $this->city;
    }
    
    public function getprovince()
    {
        return $this->province;
    }
    
    public function getpostalcode()
    {
        return $this->postalcode;
    }
    
    public function getpassword()
    {
        return $this->password;
    }
        
    #CREATING METHODS
    #like a load function
    public function userLogin($username, $password)
    {
        global $connection;
        $cust = new customer();
        
        $SQLQuery = "CALL find_customer_password(:username);";
        $PDOStatement = $connection->prepare($SQLQuery);
        $PDOStatement->bindparam(":username", $username);
        $PDOStatement->execute();
        
        if($row = $PDOStatement->fetch())
        {
            $this->username = $username;
            $this->password = $row["u_password"];
            $this->password = password_hash($this->password, PASSWORD_DEFAULT);
            
            if(password_verify($password, $this->password))
                {
                    return true;
                }
        }
        
        #close the connection
        $PDOStatement->closeCursor();
        $PDOStatement = null;
        $connection = null;

    }
    
    public function Load($username)
    {
        global $connection;
        
        $SQLQuery = "CALL customers_selectOne(:username);";
        $PDOStatement = $connection->prepare($SQLQuery);
        $PDOStatement->bindparam(":username", $username);
        $PDOStatement->execute();
        
        if($row = $PDOStatement->fetch())
            {
                $this->username = $row["username"];
                $this->customer_uuid = $row["customer_uuid"];
                $this->firstname = $row["firstname"];
                $this->lastname = $row["lastname"];
                $this->address = $row["address"];
                $this->city = $row["city"];
                $this->postalCode = $row["postal_code"];
                $this->province = $row["province"];
                $this->password = $row["u_password"];
                
            }
                                    
            $PDOStatement->closeCursor();
            $PDOStatement = null;
            $connection = null;
    }
    
            
    function regsiterNewUser()
    {
        global $connection;
        
        if($this->getcustomeruuid() != null)
        {
                
            $SQLQuery = "CALL customers_insert(:fname, :lname, :address, :city, :province, :postal_code, :uname, :u_password)";
            $PDOStatement = $connection->prepare($SQLQuery);
            $PDOStatement->bindParam(":uname", $this->username);
            $PDOStatement->bindParam(":fname", $this->firstname);
            $PDOStatement->bindParam(":lname", $this->lastname);
            $PDOStatement->bindParam(":address", $this->address);
            $PDOStatement->bindParam(":city", $this->city);
            $PDOStatement->bindParam(":province", $this->province);
            $PDOStatement->bindParam(":postal_code", $this->postalcode);
            $PDOStatement->bindParam(":u_password", $this->password);

            $PDOStatement->execute();
            $PDOStatement = null;
            $connection = null;

            return true;
        }
        else
        {
            $SQLQuery = "CALL customers_insert(:uname, :fname, :lname, :address, :city, :province, :postalcode, :u_password :customer_uuid);";
            $PDOStatement = $connection->prepare($SQLQuery);   
            $PDOStatement->bindParam(":uname", $this->username);
            $PDOStatement->bindParam(":fname", $this->firstname);
            $PDOStatement->bindParam(":lname", $this->lastname);
            $PDOStatement->bindParam(":address", $this->address);
            $PDOStatement->bindParam(":city", $this->city);
            $PDOStatement->bindParam(":province", $this->province);
            $PDOStatement->bindParam(":postalcode", $this->postalCode);
            $PDOStatement->bindParam(":u_password", $this->password);
            $PDOStatement->bindParam(":customer_uuid", $this->customer_uuid);
            
            $PDOStatement->execute();
            $PDOStatement = null;
            $connection = null;
        }
    }
    
    function update()
    {
        global $connection;
        
        $SQLQuery = "CALL customers_update(:uname, :fname, :lname, :address, :city, :province, :postal_code, :pwd, :customer_uuid);";
        $PDOStatement = $connection->prepare($SQLQuery);
        $PDOStatement->bindParam(":fname", $_POST["firstname"]);
        $PDOStatement->bindParam(":lname", $_POST["lastname"]);
        $PDOStatement->bindParam(":address", $_POST["address"]);
        $PDOStatement->bindParam(":city", $_POST["city"]);
        $PDOStatement->bindParam(":postal_code", $_POST["postal_code"]);
        $PDOStatement->bindParam(":province", $_POST["province"]);
        $PDOStatement->bindParam(":uname", $_POST["username"]);
        $PDOStatement->bindParam(":pwd", $_POST["password"]);
        $PDOStatement->bindparam(":customer_uuid", $_SESSION["customer_uuid"]);
        
        
        $PDOStatement->execute();
        $PDOStatement = null;
                
    }
    
    function delete()
    {
        global $connection;
        
         $SQLQuery = "CALL customers_delete(:customer_uuid);";
        $PDOStatement = $connection->prepare($SQLQuery);
        $PDOStatement->bindParam(":customer_uuid", $_POST[$customeruuid]);
        
        $PDOStatement->execute();   
        $PDOStatement = null;
    }
    
    function getPurchases($searcheddate = "")
    {
        $filteredPurchases = new purchases($this->getCustomer_uuid(), $searcheddate);
        return $filteredPurchases->information;
    }
}

