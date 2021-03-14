<?php
define ("FILE_PURCHASES_TEXT", FOLDER_DATA . "purchases.txt");

function addTheData()
{   
    
    if(file_exists(FILE_PURCHASES_TEXT)){
    $file = fopen(FILE_PURCHASES_TEXT, "r") or exit("didn't work!");
    
        while(!feof($file))
        {
            echo "<tr>";
            $file2 = fgets($file);
            $file3 = json_decode($file2, true);

            foreach($file3 as $key=>$value)
            {
                $styles = "";
                
                
                //for some strange reason, = doesn't work, so I replaced it with -
                if(isset($_GET["command-print"]))
                    {
                
                        if ($key == "Subtotal")
                        {
                            if($value < 100)
                            {
                                $styles = "lowSubTotal";
                            }
                            else if($value >=100 && $value <= 999.99)
                            {
                                $styles = "medSubTotal";
                            }
                            else if ($value > 999.99)
                            {
                                $styles = "highSubTotal";
                            }
                        }
                    }   
                echo "<td class= $styles>" . $value . "</td>";
                
            }

            echo "</tr>";
        }    
    }
    else
    {
        echo "Cannot open file, it doesn't exist!";
    }
 }  
 
function createOrderTables()
{

    ?>

<div class="container">
    <table class="orderTable">
        <tr>
            <th>Product ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>City</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Comments</th>
            <th>Subtotal</th>
            <th>Taxes</th>
            <th>Grand Total</th>            
        </tr>
            <?php
            addTheData();
    
            ?>
    </table>
</div>

<?php

?>

    <?php
    
}