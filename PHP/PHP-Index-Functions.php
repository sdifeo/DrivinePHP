<?php
define("FOLDER_CSS_INDEX", "CSS/");
define("FILE_CSS_INDEX", FOLDER_CSS . "general_style.css");

define("FOLDER_IMAGES_INDEX", "IMAGES/");
define("FILE_HEADER_INDEX", FOLDER_IMAGES . "CARS/indexHeader.jpg");
define("FILE_SHOWCASE_SUPERCAR", FOLDER_IMAGES . "CARS/index-showcase-1.jpg");
define("FILE_SHOWCASE_SUPERCAR2", FOLDER_IMAGES . "CARS/index-showcase-2.jpg");
define("FILE_SHOWCASE_SUPERCAR3", FOLDER_IMAGES . "CARS/index-showcase-3.png");

define("FILE_AD_1", FOLDER_IMAGES . "CARS/AD-1.jpg");
define("FILE_AD_2", FOLDER_IMAGES . "CARS/AD-2.jpg");
define("FILE_AD_3", FOLDER_IMAGES . "CARS/AD-3.png");
define("FILE_AD_4", FOLDER_IMAGES . "CARS/AD-4.jpg");
define("FILE_AD_5", FOLDER_IMAGES . "CARS/AD-5.jpg");

function showcaseSelections()
{
    ?>
<div class="containerIndexItems">
    <div class="whatWeOfferSection">
        <a href="#"><img id="selection-supercar-1" src="<?php echo FILE_SHOWCASE_SUPERCAR; ?>" alt="N/A"></a>
        <a href="#"><img id="selection-supercar-2" src="<?php echo FILE_SHOWCASE_SUPERCAR2; ?>" alt="N/A"></a>
        <a href="#"><img id="selection-supercar-3" src="<?php echo FILE_SHOWCASE_SUPERCAR3; ?>" alt="N/A"></a>
        
        <p class="selection-desc"> <span id="carTitle">Super Cars</span> <br> Finest selection of Supercars. From McLarens to Lamborghinis, we have everything you need.</p>
        <p class="selection-desc"> <span id="carTitle">Classics</span> <br> Looking for a vintage car? We have one of the largest selections in North America.</p>
        <p class="selection-desc"> <span id="carTitle">Luxury Cars</span> <br> Wether you need a luxurious car to impress a date, or something to show off, we have it all. </p>        
        
    </div>
</div>

<?php
}

function displayAd()
{
    $ads = array(FILE_AD_1, FILE_AD_2, FILE_AD_3, FILE_AD_4, FILE_AD_5);
    
    $random = array_rand($ads, 1);
    
    if ($random == $ads[0])
    {
        echo "<div class='specialOfferContainer'>";
            echo "<div class='specialOffer'>";
                echo "<a href='https://www.google.ca'> <img src='" . $ads[$random] . "'></a>";
            echo "</div>";
        echo "</div>";
    }
    else
    {
        echo "<div class='specialOfferContainer'>";
            echo "<div class='regularOffers'>";
                echo "<a href='https://www.google.ca'> <img src='" . $ads[$random] . "'></a>";
            echo "</div>";
        echo "</div>";
    }
    
    
    
//    echo "<img src='" . $ads[0] ."'>";
    
    
    ?>
        
    <?php
}

?>