<?php

define("FILE_CSS_ACCOUNT", FOLDER_CSS . "account_page.css");
require_once "customer.php";
require_once 'PHP-Functions-General.php';

    

    $cust = new customer;
    if(isset($_POST["update"]))
    {
        $cust->updateUserInfo();
    
    }
   

function createNotLoggedInSection()
{
    
}

function createUpdateForm()
{
    
    if(isset($_SESSION["customer_uuid"]))
    {
        
        $cust = new customer();
        $cust->grabAllUserInfo($_SESSION["username"]); 
?>    
        <div class="pageContainer">
            <h2 id="headerForm">Edit your account info here!</h2>

            <div class="AccountFormDesign">

                <form action="account.php" method="POST" class="infoForms">

                    <label>First Name: </label>
                    <input type="text" name="firstname" value="<?php echo $cust->getFirstname();?>">
                    
                    
                    <span id="urgent">*</span>
                    <div class="errorMessage">

                    </div>

                    <label>Last Name: </label>
                    <input type="text" name="lastname" value="<?php echo $cust->getLastName(); ?>"><span id="urgent">*</span>
                    <div class="errorMessage">

                    </div>

                    <label>Address: </label>
                    <input type="text" name="address" value="<?php echo $cust->getAddress(); ?>"><span id="urgent">*</span>
                    <div class="errorMessage">

                    </div>

                    <label>City: </label>
                    <input type="text" name="city" value="<?php echo $cust->getCity(); ?>"><span id="urgent">*</span>
                    <div class="errorMessage">

                    </div>

                    <label>Postal Code: </label>
                    <input type="text" name="postal_code" value="<?php echo $cust->getPostalCode(); ?>"><span id="urgent">*</span>
                    <div class="errorMessage">

                    </div>

                    <label>Province: </label>
                    <input type="text" name="province" value="<?php echo $cust->getProvince(); ?>"><span id="urgent">*</span>
                    <div class="errorMessage">

                    </div>

                    <label>Username: </label>
                    <input type="text" name="username" value="<?php echo $cust->getUsername(); ?>"><span id="urgent">*</span>
                    <div class="errorMessage">

                    </div>

                    <label>Password: </label>
                    <input type="password" name="password" value="<?php echo $cust->getPassword();?>"><span id="urgent">*</span>
                    <div class="errorMessage">

                    </div>

                    <input type="submit" name="update" value="Update">
                </form>

            </div>        
        </div>

<?php
    }
    else
    {
        echo "You must be logged into to see this page!";
        createNotLoggedInSection();
    }
}