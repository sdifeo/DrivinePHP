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
                
    }
    
    function updateUserInfo($username, $firstname, $lastname, $address, $city, $province, $postalCode, $password)
    {
        
    }
}

