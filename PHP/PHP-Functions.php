<?php

define("FOLDER_CSS", "CSS/");
define("FILE_CSS_STYLES_INDEX", FOLDER_CSS . "index_style.css");

define("FOLDER_IMAGES", "IMAGES/");
define("FILE_LOGO", FOLDER_IMAGES . "DRIVINE.png");

function createPageHeader($title)
{
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title><?php echo $title ?></title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="<?php echo FILE_CSS_STYLES_INDEX; ?>">
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
                    <li id="NB-B1"><a href="#"><span>Home</span></a></li>
                    <li id="NB-B2"><a href="#">Home</a></li>
                    <li id="NB-B3"><a href="#">Home</a></li>
                    <li id="NB-B3"><a href="#">Home</a></li>
                </ol>
            </div>
        
        <hr id="navBar-HLine">
    </div>    
        <?php
}

function showAds()
{
    
}


