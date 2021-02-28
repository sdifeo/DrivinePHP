<!-- TO DO: HOMEPAGE
DISPLAY LOGO
GIVE BRIEF DESCRIPTION OF WEBSITE
DISPLAY MAIN HEADER IMAGE (LEXUS?) - GIVE BRIEF DESCRIPTION OF CAR

CONTENT:
SHOW CARS/BIKES WITH BRIEF DESCRIPTION
CREATE ADVERTISMENT SECTION - BOTTOM OF PAGE?
-->

<?php
//PHP functions
    require_once "PHP/PHP-Functions.php";
    
?>

<!DOCTYPE html>


<?php
createPageHeader("Home Page");
?>

<div class="imgBG">
    
<?php
createNavigationBar();
?>
    
    <p id="headerIntro">Welcome to <span id="drivineName">Drivine</span>. Delivering superb quality 
        and prices, here, you will find the vehicle of your dreams. Simply Divine.
    </p>
</div>

<img id="LC-500-indexHeader" src="./IMAGES/CARS/indexHeader.jpg" alt="N/A"/>


<!-- Going to add the ADs now -->
<p id="indexQuickSelection">Take a quick look at our special offers</p>

<div class="indexItems">
    
</div>

    </body>
</html>