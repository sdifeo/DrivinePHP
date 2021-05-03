<?php

require_once 'PHP/customer.php';
require_once 'PHP/customers.php';
require_once 'PHP/products.php';
require_once 'PHP/purchase.php';
require_once 'PHP/purchases.php';
header("Content-type: text/plain");

$purchase = new purchase();

if(isset($_POST["deleteRow"]))
{
    $purchase->delete($purchase->getPurchaseUUID());
}

if(isset($_POST["searchdate"]))
{
    $searcheddate = htmlspecialchars($_POST["searchdate"]);

    $customer = new customer();
    $customer->Load($_SESSION["username"]); 
    $filteredPurchases = $customer->getPurchases($searcheddate);
        
    ?>
    <table class='generated-purchases-table'>
        
        <tr>
            <th>Product Code:</th>
            <th>First Name:</th>
            <th>Last Name:</th>
            <th>City:</th>
            <th>Comment:</th>
            <th>Price:</th>
            <th>Quantity:</th>
            <th>Subtotal:</th>
            <th>Taxes:</th>
            <th>Grand Total:</th>
        </tr>
    <?php
    
    foreach($filteredPurchases as $purchase)
    {
        $product = new product();
        $product->load($purchase->getProductUUID());
        ?>
        <tr>
            <td><input type="submit" value="Delete" name="deleteRow"></input></td>
            <td value="<?php echo $purchase->getPurchaseUUID() ?>"><?php echo $product->getProductCode()?></td>
            <td><?php echo $customer->getFirstname()?></td>
            <td><?php echo $customer->getLastname()?></td>
            <td><?php echo $customer->getCity()?></td>
            <td><?php echo $purchase->getComments()?></td>
            <td><?php echo $purchase->getPriceAtPurchase()?></td>
            <td><?php echo $purchase->getQuantity()?></td>
            <td><?php echo $purchase->getSubtotal()?></td>
            <td><?php echo $purchase->getTaxesAmount()?></td>
            <td><?php echo $purchase->getGrandTotal()?></td>
        </tr>
        
        <?php
        
    }
        
    ?> 
    </table>
<?php
}
