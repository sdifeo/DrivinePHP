<?php
define ("FILE_PURCHASES_TEXT", FOLDER_DATA . "purchases.txt");
define ("FILE_PHPCHEATSHEET", FOLDER_DATA . "PHP-CheatSheet.docx");
define ("FILE_PHPCHEATSHEET_ALT", FOLDER_DATA . "PHP-CheatSheet.txt");

header("Expires: Thu, 01 Dec 2019 13:00:00 EST");
header("Cache-Control: no-cache");
header("Pragma: no-cache");

require_once 'PHP-Functions-General.php';

echo $_SESSION["customer_uuid"];
function addTheData()
{   
    
    if(file_exists(FILE_PURCHASES_TEXT)){
    $file = fopen(FILE_PURCHASES_TEXT, "r") or exit("didn't work!");
    
        while(!feof($file))
        {
            echo "<tr>";
            $file2 = fgets($file);
            $file3 = json_decode($file2, true);

            if (is_array($file3)) //was getting an error, googled it, https://stackoverflow.com/questions/2630013/invalid-argument-supplied-for-foreach, this helped a lot
        {
            foreach($file3 as $key=>$value)
            {
                $styles = "";
                $dollaBills = "";
                
                    if ($key == "Price" or $key == "Taxes" or $key == "GrandTotal" or $key == "Subtotal") 
                    {
                        $dollaBills = "$";
                    }
                    //for some strange reason, = doesn't work, so I replaced it with -
                    if(isset($_GET["command"]) && $_GET["command"]=="color")
                        {

                            if ($key == "Subtotal")
                            {
                                $dollaBills = "$";
                                
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
                        
                echo "<td class= $styles>" . $value . $dollaBills . "</td>";
                }
            echo "</tr>";
            }
        }    
    }
    else
    {
        echo "Cannot open file, it doesn't exist!";
    }
    
 }  
 
 //create the
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
            //call function so it can do its job
            addTheData();
    
            ?>
    </table>
</div>

<?php

function createDownload()
{
    ?>
<div class="containerBtn">
    <a class="cheatSheetButton" href="<?php echo FILE_PHPCHEATSHEET;?>" download> Download cheat sheet (DOCX)</a>
    <a class="cheatSheetButton" href="<?php echo FILE_PHPCHEATSHEET_ALT;?>" download> Download cheat sheet (TXT)</a>
</div>    
    <?php
}

?>

    <?php
    
}