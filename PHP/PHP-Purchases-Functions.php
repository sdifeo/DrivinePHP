<?php

define("FILE_CSS_ACCOUNT", FOLDER_CSS . "account_page.css");
require_once "customers.php";

//create the form if the customer is signed in
function createPurchasesForm()
{
    
    if(isset($_SESSION["customer_uuid"]))
    {
?>    
    <div class="pageContainer">
    <h2 id="headerForm">Check out your purchase history</h2>
    
    <div class="AccountFormDesign">
        
        
            
            <label>Show purchases on this date or later: </label>
            <input type="text" name="searchdate" id="searchdate">
            <span id="urgent">*</span>
            <div class="errorMessage">

            </div>
                
            
        
        <button value="Search" onclick="searchPurchases()">Search</button>
        
    </div>        
</div>

<div id="searchResults">
    
</div>

<?php
    }
    //if not signed in, throw them an error, warn them they need to be logged in
    else
    {
        echo "<h2 id='notSignedIn'> You can only use this page once you are logged in! </h2>";
    }
}