<?php
require_once "PHP-Functions-General.php";


define("FILE_CSS_REGISTER", FOLDER_CSS . "register_page.css");
require_once "customer.php";

if(!isset($_SESSION["customer_uuid"]))
{

    function createRegistrationForm()
    {
        


        if(isset($_POST["register"]))
        {
            $cust = new customer;
           
            $cust = new customer($_POST["username"], $_POST["firstname"], $_POST["lastname"], $_POST["address"], $_POST["city"], 
            $_POST["province"], $_POST["postal_code"], $_POST["password"]);
            
            echo $_POST["postal_code"];
                
            $cust->regsiterNewUser();
                
            echo "<h3 id='notifySignUp'>Thanks for signing up! You can now log in! </h3>";
        }
        else
        {
            echo "error";
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
                <input type="text" name="postal_code"><span id="urgent">*</span>
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

                <input type="submit" name="register" value="Register">
            </form>

        </div>        
    </div>
<?php
    }
}

    if(isset($_SESSION["customer_uuid"]))
    {
        ?>
            <h3 id="notifyLoggedIn">You already have an account and are signed in! </h3>
        <?php
    }
