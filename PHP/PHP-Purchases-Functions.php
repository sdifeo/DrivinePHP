<?php

define("FILE_CSS_ACCOUNT", FOLDER_CSS . "account_page.css");
require_once "customer.php";


if(isset($_POST["searchForDate"]))
{
    
}


function createRegistrationForm()
{
?>    
    <div class="pageContainer">
    <h2 id="headerForm">Edit your account info here!</h2>
    
    <div class="AccountFormDesign">
        
        <form action="account.php" method="POST" class="infoForms">
            
            <label>Show purchases on this date or later: </label>
            <input type="text" name="firstname">
            <span id="urgent">*</span>
            <div class="errorMessage">

            </div>
                
            <input type="submit" name="searchForDate" value="Search">
        </form>
        
    </div>        
</div>

<?php
}