<?php
define("FILE_CSS_BUYPAGE", FOLDER_CSS . "buying_page_style.css");
define ("PRODUCTCODE_MAX_LEN", 12);
define ("NAME_MAX_LEN", 20);
define ("CITY_MAX_LEN", 8);
define ("COMMENTS_MAX_LEN", 200);
define ("PRICE_MAX", 10000);
define ("QUANTITY_MAX", 99);

function test()
{
    echo "testing123";
}

function createBuyingForm()
{
    ?>

<?php
//set some variables
$errorPCode = "";
$patternPCode = "([P,p]{1})";
$errorFName = "";
$errorLName = "";
$errorCity = "";
$errorComments = "";
$errorPrice= "";
$errorQuantity="";


    if(isset(($_POST["saveBtn"])))
    {
        $pCode = htmlspecialchars(trim($_POST["prodCode"]));
        
        //validation for Produce Code
        if($pCode == "")
        {
            $errorPCode = "A product code is required.";

        }
        else
        {
            if(mb_strlen($pCode) > PRODUCTCODE_MAX_LEN)
            {
                $errorPCode = "Product code cannot be more than " . PRODUCTCODE_MAX_LEN . " characters.";
            }
            elseif(preg_match($patternPCode, $errorPCode))
            {
                $errorPCode = "The product must start with P or p.";
            }
        }
        
        //validation for first name
        $fNameInput = htmlspecialchars(trim($_POST["firstName"]));
        if($fNameInput == "")
        {
            $errorFName = "This field must not be empty.";
        }
        elseif (mb_strlen($fNameInput) > NAME_MAX_LEN)
        {
                $errorFName = "There is a maximum of " . NAME_MAX_LEN. " characters for this field.";
        }
        //validation for last name
        $lNameInput = htmlspecialchars(trim($_POST["lastName"]));
        echo $errorLName;
        if ($lNameInput == "")
        {
            $errorLName = "This field must not be empty.";
        }
        elseif(mb_strlen($lNameInput) > NAME_MAX_LEN)
        {
            $errorLName = "There is a maximum of " . NAME_MAX_LEN. " characters for this field.";
        }
        
        //validation for City
        $cityInput = htmlspecialchars(trim($_POST["city"]));
        if($cityInput == "")
        {
            $errorCity = "Please input your city.";
        }
        elseif(mb_strlen($cityInput) > CITY_MAX_LEN)
        {
            $errorCity = "There is a maximum of " . CITY_MAX_LEN. " characters for this field.";
        }
        
        //validation for Comments
        $commentInput = htmlspecialchars(trim($_POST["comments"])); 
        if(mb_strlen($commentInput) > COMMENTS_MAX_LEN)
        {
            $errorComments = "There is a maximum of " . COMMENTS_MAX_LEN . " characters";
        }
        
        //validation for price
        $priceInput = htmlspecialchars(trim($_POST["price"]));
        if ($priceInput > PRICE_MAX)
        {
            $errorPrice = "Enter a price lower than $" . PRICE_MAX . ".";
        }
        elseif (is_numeric($priceInput) != true )
        {
            $errorPrice = "Please only enter numbers that are larger than 0.";
        }
        
        $quantityInput = htmlspecialchars(trim($_POST["quantity"]));
        if($quantityInput > QUANTITY_MAX)
        {
            $errorQuantity = "You can only purchase a maximum of " . QUANTITY_MAX . " items.";
        }
        elseif($quantityInput != number_format($quantityInput))
        {
            $errorQuantity = "You can only buy full items (no decimals).";
        }
        
        //checking if all is clear to proceed
        if($errorPCode=="" && $errorFName=="" && $errorLName=="" && $errorComments=="" && $errorPrice=="" && $errorQuantity=="")
        {
            $pCode = "";
            $fNameInput = "";
            $lNameInput = "";
            $cityInput = "";
            $commentInput = "";
            $priceInput = "";
            $quantityInput = "";
            
            echo "<p id='notifyPurchase'>Thank you for your purchase!</p>";                        
        }
    }   
?>
    
<div class="pageContainer">
    <h2 id="headerForm">Place an order below</h2>
    
    <div class="buyingFormDesign">
        
        <form action="BuyPage.php" method="POST" class="buyingForms">
            
            <label>Product Code: </label>
            <input type="text" name="prodCode" value="<?php if(isset($pCode)){echo $pCode;}?>">
            <div class="errorMessage">
                <?php echo $errorPCode ?>
            </div>
                
            <label>First Name: </label>
            <input type="text" name="firstName" value="<?php if(isset($fNameInput)){echo $fNameInput;}?>">
            <div class="errorMessage">
                <?php echo $errorFName ?>
            </div>
            
            <label>Last Name: </label>
            <input type="text" name="lastName" value="<?php if(isset($lNameInput)){echo $lNameInput;}?>">
            <div class="errorMessage">
                <?php echo $errorFName ?>
            </div>
            
            <label>City: </label>
            <input type="text" name="city" value="<?php if(isset($cityInput)){echo $cityInput;}?>">
            <div class="errorMessage">
                <?php echo $errorCity ?>
            </div>
            
            <label>Comments: </label>
            <input type="text" name="comments" value="<?php if(isset($commentInput)){echo $commentInput;}?>">
            <div class="errorMessage">
                <?php echo $errorComments ?>
            </div>
            
            <label>Price: </label>
            <input type="text" name="price" value="<?php if(isset($priceInput)){echo $priceInput;}?>">
            <div class="errorMessage">
                <?php echo $errorPrice ?>
            </div>
            
            <label>Quantity: </label>
            <input type="text" name="quantity" value="<?php if(isset($quantityInput)){echo $quantityInput;}?>">
            <div class="errorMessage">
                <?php echo $errorQuantity ?>
            </div>
            
            <input type="submit" name="saveBtn">
        </form>
        
    </div>        
</div>

    <?php
}
?>

