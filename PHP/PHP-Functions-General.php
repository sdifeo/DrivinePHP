<?php

define("FOLDER_CSS", "CSS/");
define("FOLDER_DATA", "DATA/");
define("FOLDER_JAVASCRIPT", "JAVASCRIPT/");

define("FILE_JAVASCRIPT", FOLDER_JAVASCRIPT . "ModalJS.js");
define("FILE_CSS_STYLES_GENERAL", FOLDER_CSS . "general_style.css");
define("FILE_CSS_STYLES_INDEX", FOLDER_CSS . "index_style.css");

define("FOLDER_IMAGES", "IMAGES/");
define("FILE_LOGO", FOLDER_IMAGES . "DRIVINE.png");

header("Expires: Thu, 01 Dec 2019 13:00:00 EST");
header("Cache-Control: no-cache");
header("Pragma: no-cache");

require_once "connection.php";


//the header to generate the HTML 
//has two CSS pages because I like to have a general CSS that affects what I need (such as the nav bar)
//then the other to edit/design the specifics of the page itself. I feel like its neater
function createPageHeader($title, $css, $css2, $bgColour, $JS)
{
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title><?php echo $title ?></title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="<?php echo FOLDER_CSS . $css; ?>">
            <link rel="stylesheet" href="<?php echo FOLDER_CSS . $css2; ?>">
            <script src="<?php echo FOLDER_JAVASCRIPT . $JS; ?>"></script>  
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
                
                 <?php
                    createLoginModal()
                ?>
                
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
                
    echo "An error occured in the file '" . $error->getFile() . "', on line "  . " Error " . $error->getMessage();
}

function createLoginModal()
{
      ?>
            
            <button id="test1" class="loginButtonModal" onclick="changeDisplayFunction()">Login</button>
        
            <div class="formContainer">    
                <form id="loginModalForm" class="loginModalForm" action=index.php method="POST">
                    <div class="insideModalForm">
                         
                        <label id="formLabel"> Username: </label>
                        <input id="formTextbox" type="text" name="username">
                        </br>
                        <label id="formLabel"> Password: </label>
                        <input id="formTextbox "type="text" name="password">
                        <br>

                        <br>
                        <input id="formButton" name="login" type="submit" value="Login"> 
                        <input id="formButtonClose" type="submit" value="Cancel" onclick="closeLoginForm()">
                    </div>
                </form>
            </div>
    <?php
    
    if(isset($_POST["login"]))
    {        
        #establish connection        
        global $connection;
                
        $SQLQuery = "CALL find_customer_password(:username);";
        $PDOStatement = $connection->prepare($SQLQuery);
        $PDOStatement->bindparam(":username", $_POST["username"]);
        $PDOStatement->execute();

        #loop through and find what we are looking for
        while ($row = $PDOStatement->fetch()) 
        {
            echo "<br> Welcome " . $row["firstname"];
        }

        #close the connection
        $PDOStatement->closeCursor();
        $PDOStatement = null;
        
        $connection = null;
        
    }
}
