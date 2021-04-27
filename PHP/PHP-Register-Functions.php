<?php

define("FILE_CSS_REGISTER", FOLDER_CSS . "register_page.css");
require_once "customer.php";


function createRegistrationForm()
{
    $cust = new customer();
    
    
    if(isset($_POST["register"]))
    {

    $cust->regsiterNewUser("postalcode", "username", "firstname", "lastname", 
            "address", "province", "city", "password");
    }
    
    
?>    
    <div class="pageContainer">
    <h2 id="headerForm">Enter your info to register!</h2>
    
    <div class="buyingFormDesign">
        
        <form action="register.php" method="POST" class="buyingForms">
            
            <label>First Name: </label>
            <input type="text" name="firstname"><span id="urgent">*</span>
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
            <input type="text" name="password"><span id="urgent">*</span>
            <div class="errorMessage">

            </div>
            
            <input type="submit" name="register" value="Register">
        </form>
        
    </div>        
</div>

<?php
}