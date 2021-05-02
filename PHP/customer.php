<?php
#REVISION HISTORY
#LAST WORKED ON: APRIL 26, 2021
#
#CREATED getters and setters....
#also created methods
#
#STEVEN DI FEO 
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
    private $postalCode = "";
    private $password = "";
    private $dateCreated;
    
    #creating constructor - called every time we instantiate an object
    function __construct($newUsername="", $newFirstname="", $newLastname="", $newAddress="", $newCity="", $newProvince="", $newPostalcode="", $newPassword="") 
    {
        $this->setUsername($newUsername);
        $this->setFirstname($newFirstname);
        $this->setLastname($newLastname);
        $this->setAddress($newAddress);
        $this->setCity($newCity);
        $this->setProvince($newProvince);
        $this->setPostalCode($newPostalcode);
        $this->setPassword($newPassword);
    }
    
    
    #creating getters and setters
     
    public function getCustomer_uuid()
    {
        return $this->customer_uuid;
    }
        
    public function getUsername()
    {
        return $this->username;
    }
    
    public function setUsername($newUsername)
    {
        if (mb_strlen($newUsername) == 0)
        {
            return "Username cannot be empty";;
        }
        else 
        {
            if (mb_strlen($newUsername) > USERNAME_MAX_LEN)
            {
                return "Username cannot be more than 12 characters";
            }
            else
            {
                $this->username = $newUsername;
            }
        }
    }
    
    public function getFirstname()
    {
        return $this->firstname;
    }
    
    public function setFirstname($newFirstname)
    {
        if (mb_strlen($newFirstname) == 0)
        {
            return "Your first name cannot be empty";;
        }
        else 
        {
            if (mb_strlen($newFirstname) > FIRSTNAME_MAX_LEN)
            {
                return "Your first name cannot be more than " . FIRSTNAME_MAX_LEN;
            }
            else
            {
                $this->firstname = $newFirstname;
            }
        }
    }
    
    public function getLastname()
    {
        return $this->lastname;
    }
    
    public function setLastname($newlastname)
    {
        if (mb_strlen($newlastname) == 0)
        {
            return "Your last name cannot be empty";
        }
        else 
        {
            if (mb_strlen($newlastname) > LASTNAME_MAX_LEN)
            {
                return "Your last name cannot be more than " . LASTNAME_MAX_LEN;
            }
            else
            {
                $this->lastname = $newlastname;
            }
        }
    }
    
    public function getAddress()
    {
        return $this->address;
    }
    
    public function setAddress($newAddress)
    {
        if (mb_strlen($newAddress) == 0)
        {
            return "Your address cannot be empty";
        }
        else 
        {
            if (mb_strlen($newAddress) > ADDRESS_MAX_LEN)
            {
                return "Your address cannot be more than " . ADDRESS_MAX_LEN;
            }
            else
            {
                $this->address = $newAddress;
            }
        }
    }
    
    public function getCity()
    {
        return $this->city;
    }
    
    public function setCity($newCity)
    {
        if (mb_strlen($newCity) == 0)
        {
            return "Your city cannot be empty";
        }
        else 
        {
            if (mb_strlen($newCity) > CITY_MAX_LEN)
            {
                return "Your city cannot be more than " . CITY_MAX_LEN;
            }
            else
            {
                $this->city = $newCity;
            }
        }
    }
    
    public function getProvince()
    {
        return $this->province;
    }
    
    public function setProvince($newProvince)
    {
        if (mb_strlen($newProvince) == 0)
        {
            return "Your province cannot be empty";
        }
        else 
        {
            if (mb_strlen($newProvince) > PRODUCTCODE_MAX_LEN)
            {
                return "Your province cannot be more than " . PRODUCTCODE_MAX_LEN;
            }
            else
            {
                $this->province = $newProvince;
            }
        }
    }
    
    public function getPostalCode()
    {
        return $this->postalCode;
    }
    
    public function setPostalCode($newPostalCode)
    {
        if (mb_strlen($newPostalCode) == 0)
        {
            return "Your postalcode cannot be empty";
        }
        else 
        {
            if (mb_strlen($newPostalCode) > POSTALCODE_MAX_LEN)
            {
                return "Your postalcode cannot be more than " . POSTALCODE_MAX_LEN;
            }
            else
            {
                $this->postalcode = $newPostalCode;
            }
        }
    }
    
    public function getPassword()
    {
        return $this->password;
    }
    
    public function setPassword($newPassword)
    {
        if (mb_strlen($newPassword) == 0)
        {
            return "Your password cannot be empty";
        }
        else 
        {
            if (mb_strlen($newPassword) > PASSWORD_MAX_LEN)
            {
                return "Your password cannot be more than " . PASSWORD_MAX_LEN . " characters";
            }
            else
            {
                $this->password = $newPassword;
            }
        }
    }
    
    public function getCreationDate()
    {
        return $this->dateCreated;
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
    
    public function grabAllUserInfo($username)
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
            
    function regsiterNewUser($username, $firstname, $lastname, $address, $city, $province, $postalCode, $password)
    {
        global $connection;
        
        $SQLQuery = "CALL customers_insert(:fname, :lname, :address, :city, :postalcode, :province, :uname, :pwd);";
        $PDOStatement = $connection->prepare($SQLQuery);      
        $PDOStatement->bindParam(":fname", $_POST[$firstname]);
        $PDOStatement->bindParam(":lname", $_POST[$lastname]);
        $PDOStatement->bindParam(":address", $_POST[$address]);
        $PDOStatement->bindParam(":city", $_POST[$city]);
        $PDOStatement->bindParam(":postalcode", $_POST[$postalCode]);
        $PDOStatement->bindParam(":province", $_POST[$province]);
        $PDOStatement->bindParam(":uname", $_POST[$username]);
        $PDOStatement->bindParam(":pwd", $_POST[$password]);
        
        $PDOStatement->execute();
        $PDOStatement = null;
        $connection->close();
                        
    }
    
    function updateUserInfo()
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
}

