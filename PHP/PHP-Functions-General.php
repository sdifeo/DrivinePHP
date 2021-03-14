<?php

define("FOLDER_CSS", "CSS/");
define("FOLDER_DATA", "DATA/");
define("FILE_CSS_STYLES_GENERAL", FOLDER_CSS . "general_style.css");
define("FILE_CSS_STYLES_INDEX", FOLDER_CSS . "index_style.css");

define("FOLDER_IMAGES", "IMAGES/");
define("FILE_LOGO", FOLDER_IMAGES . "DRIVINE.png");

header("Expires: Thu, 01 Dec 2019 13:00:00 EST");
header("Cache-Control: no-cache");
header("Pragma: no-cache");


//the header to generate the HTML 
//has two CSS pages because I like to have a general CSS that affects what I need (such as the nav bar)
//then the other to edit/design the specifics of the page itself. I feel like its neater
function createPageHeader($title, $css, $css2, $bgColour)
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
        <body class="<?php echo $bgColour ?>">
            
        
    <?php
}


//creating the nav bar a the top
//wanted to go with a simplistic website, and a logo that I had created for the site
//3 buttons at the top, logo top left 
function createNavigationBar()
{
    ?>
    <div class="navigationBar">
        <li id="li-Logo-Drivine"><img id="logo-Drivine" src="<?php echo FILE_LOGO;?>"></li>
            <div class="nav-Buttons">
                <ol class="navBar-OL">
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
    ?>
        <div class="footerBar">
            <p>Copyright Steven Di Feo (1934386) <?php echo date("Y"); ?></p>
        </div>
    <?php
}

function errorManage($errorNumber, $errorString, $errorFile, $errorLine)
{
    
    $debug=false;
    //generic error}
    echo "An error has occured! We apologize. Check the erorr logs for details";
    
    //erorr for admin/devs
    echo "An error occured in the file $errorFile, on line $errorLine.
        Error $errorNumber - $errorString";
    
    die();
}

function ExceptionManage($error)
{
    //generic error}
    echo "An error has occured! We apologize. Check the erorr logs for details";
    
    //erorr for admin/devs
                
    echo "An error occured in the file '" . $error->getFile() . "', on line " . $errorLine->getLine() . " Error " . $error->getMessage();
}


