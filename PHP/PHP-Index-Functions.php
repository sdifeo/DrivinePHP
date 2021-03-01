<?php
define("FOLDER_CSS_INDEX", "CSS/");
define("FILE_CSS_INDEX", FOLDER_CSS . "general_style.css");

define("FOLDER_IMAGES_INDEX", "IMAGES/");
define("FILE_HEADER_INDEX", FOLDER_IMAGES . "CARS/indexHeader.jpg");
define("FILE_SHOWCASE_SUPERCAR", FOLDER_IMAGES . "CARS/index-showcase-1.jpg");
define("FILE_SHOWCASE_SUPERCAR2", FOLDER_IMAGES . "CARS/index-showcase-2.jpg");

function showcaseSelections()
{
    ?>
<div class="containerIndexItems">
    <div class="whatWeOfferSection">
        <img id="selection-supercar-1" src="<?php echo FILE_SHOWCASE_SUPERCAR; ?>" alt="N/A">
        <img id="selection-supercar-2" src="<?php echo FILE_SHOWCASE_SUPERCAR2; ?>" alt="N/A">
        <img id="selection-supercar-3" src="<?php echo FILE_SHOWCASE_SUPERCAR; ?>" alt="N/A">
        <p id="selection-desc">Super Cars</p>
        <p id="selection-desc">Classics</p>
        <p id="selection-desc">Luxury Cars</p>

        
    </div>
</div>

<?php
}

function displayAd()
{
    ?>
        <div>
            <p>Our current special</p>
            
        </div>
    <?php
}