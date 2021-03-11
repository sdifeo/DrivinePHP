<?php
define("FOLDER_CSS", "CSS/");
define("FOLDER_DATA", "DATA/");
define("FILE_CSS_STYLES_GENERAL", FOLDER_CSS . "general_style.css");
define("FILE_CSS_STYLES_INDEX", FOLDER_CSS . "index_style.css");


define("FOLDER_IMAGES", "IMAGES/");
define("FILE_LOGO", FOLDER_IMAGES . "DRIVINE.png");

function createPageHeader($title, $css, $css2)
{
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title><?php echo $title ?></title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="<?php echo FOLDER_CSS . $css; ?>">
            <link rel="stylesheet" href="<?php echo FOLDER_CSS . $css2; ?>">
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
        </head>
        <body>
            
        
    <?php
}

function createNavigationBar()
{
    ?>
    <div class="navigationBar">
            <div class="nav-Buttons">
                <ol class="navBar-OL">
                    <li id="li-Logo-Drivine"><a href="#"><img id="logo-Drivine" src="<?php echo FILE_LOGO;?>"></li>
                    <li id="NB-B1"><a href="index.php"><span>Home</span></a></li>
                    <li id="NB-B2"><a href="BuyPage.php">Purchase</a></li>
                    <li id="NB-B3"><a href="OrdersPage.php">Order</a></li>
                </ol>
            </div>
        
        <hr id="navBar-HLine">
    </div>    
        <?php
}

function generateFooter()
{
    
}


