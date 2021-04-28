<?php

define("FILE_CSS_ACCOUNT", FOLDER_CSS . "account_page.css");
require_once "customer.php";


function createRegistrationForm()
{
    $cust = new customer;
    if(isset($_POST["register"]))
    {

    $cust->loadUserInfo("86ece132-a53d-11eb-a5e7-98fa9bee1312");
    }
    
    
?>    
    <div class="pageContainer">
    <h2 id="headerForm">Edit your account info here!</h2>
    
    <div class="AccountFormDesign">
        
        <form action="account.php" method="POST" class="infoForms">
            
            <label>First Name: </label>
            <input type="text" name="firstname">
            <span id="urgent">*</span>
            <div class="errorMessage">

            </div>
                
            <label>Last Name: </label>
            <input type="text" name="lastname"><span id="urgent">*</span>
            <div class="errorMessage">

            </div>
            
            <label>Address: </label>
            <input type="text" name="address"><span id="urgent">*</span>
            <div class="errorMessage">

            </div>
            
            <label>City: </label>
            <input type="text" name="city"><span id="urgent">*</span>
            <div class="errorMessage">

            </div>
            
            <label>Postal Code: </label>
            <input type="text" name="postalcode"><span id="urgent">*</span>
            <div class="errorMessage">

            </div>
            
            <label>Province: </label>
            <input type="text" name="province"><span id="urgent">*</span>
            <div class="errorMessage">

            </div>
            
            <label>Username: </label>
            <input type="text" name="username"><span id="urgent">*</span>
            <div class="errorMessage">

            </div>
            
            <label>Password: </label>
            <input type="password" name="password"><span id="urgent">*</span>
            <div class="errorMessage">

            </div>
            
            <input type="submit" name="update" value="Update">
        </form>
        
    </div>        
</div>

<?php
}