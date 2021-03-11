<?php
define ("FILE_PURCHASES_TEXT", FOLDER_DATA . "purchases.txt");


function createOrderTables()
{
    $file = fopen(FILE_PURCHASES_TEXT, "r+") or exit("The file cannot be opened.");
    $decoded = json_decode($file);
    
 
    ?>


<div class="container">
    <table class="orderTable">
        <tr>
            <th>Product ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>City</th>
            <th>Comments</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>Taxes</th>

        </tr>
    </table>
</div>
<?php
}