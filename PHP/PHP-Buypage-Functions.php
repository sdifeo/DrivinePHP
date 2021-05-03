<?php
header("Expires: Thu, 01 Dec 2019 13:00:00 EST");
header("Cache-Control: no-cache");
header("Pragma: no-cache");

define("FILE_CSS_BUYPAGE", FOLDER_CSS . "buying_page_style.css");

define ("PRODUCTCODE_MAX_LEN", 12);
define ("NAME_MAX_LEN", 20);
define ("CITY_MAX_LEN", 8);
define ("COMMENTS_MAX_LEN", 200);
define ("PRICE_MAX", 10000);
define ("QUANTITY_MAX", 99);
define ("LOCAL_TAXES", .152);
header('content-type: text/html; charset=utf-8');

require_once "product.php";
require_once "products.php";
require_once "connection.php";



//Had to do first create the HTML that would be accessed
//then the validation - it wasn't that difficult, more tediuos than anything
//finally write the file and do the encoding

//for the array, I had found that making it associative made things easier personally, 
function createBuyingForm()
{
    ?>

<?php


//if button is pressed, do all this wonderful code below
if(isset($_POST["sendtoDB"]))
{    
    $prod = new product();
    $custid = $_SESSION["customer_uuid"];
    
    //load the information from the selected product
    $prod->load($_POST["productsSelect"]);
    
    //time to calculate the grand total for our lovely customer
    $price = $prod->getPrice();
    $quantity = HTMLSPECIALCHARS($_POST["quantity"]);
    $subtotal = $price * $quantity;
    $taxesAmount = $subtotal * LOCAL_TAXES;
    $grandTotal = $subtotal + $taxesAmount;
    
    //send all the required information to the function, to save to the DB
    $prod->save($custid, $prod->getProductUUID(), $prod->getPrice(), $subtotal, LOCAL_TAXES, $grandTotal);
}    

    unset($_POST["sendtoDB"]);
?>
    
<div class="pageContainer">
    
    <?php
    
    if(isset($_SESSION["customer_uuid"]))
    {
        
        //so if we have someone logged in/has a session created
        //we generate this HTML code that displays the buy
    ?>
    
        <h2 id="headerForm">Place an order below</h2>

        <div class="buyingFormDesign">

            <form action="BuyPage.php" method="POST" class="buyingForms">

                <label>Product Code<span id="urgent">*</span>: </label>
                <select name="productsSelect">
                    <?php
                    $products = new products();
                    foreach($products->information as $prod)
                    {
                        echo "<option value='" . $prod->getProductUUID() . "'>" . $prod->getProductCode() . " - " . $prod->getProductDescription() . "  ("
                                . $prod->getPrice(). ")" .  "</option>?>";

                    }

                        ?>

                </select>
                <div class="errorMessage">
                    <?php ?>
                </div>

                <label>Comments: </label>
                <input type="text" name="comments">
                <div class="errorMessage">
                    <?php  ?>
                </div>

                <label>Quantity<span id="urgent">*</span>: </label>
                <input type="text" name="quantity" >
                <div class="errorMessage">
                    <?php  ?>
                </div>

                <input type="submit" name="sendtoDB" value="Purchase">

            </form>

        </div>        
    </div>
    <?php
    }
    
    //if we arent signed in, throw the customer a heads up
    if(!isset($_SESSION["customer_uuid"]))
    {
            echo "<h2 id='notSignedIn'> You can only use this page once you are logged in! </h2>";
            
    }
    
}
?>