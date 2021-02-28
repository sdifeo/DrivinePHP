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
    
    define("FOLDER_PHP", "PHP/");
    define("FILE_PHP_FUNCTIONS", FOLDER_PHP . "PHP-Functions.php");
    
//IMAGES
    define("FOLDER_IMAGES", "IMAGES/");
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

<div>
    
</div>

    </body>
</html>