<?php


#used to load up the main body - HTML tags like DOCTYPE, body, title, etc
function createPageHeader($title)
{
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>$title</title>
            <link rel="stylesheet" href="<?php echo FILE_CSS_STYLES; ?>">
        </head>
        <body>
            
        
        <?php
}

function createNavigationBar()
{
    ?>
    <div class="navigationBar">
            <div class="nav-Buttons">
                <ol>
                    <li> <a href="#">Home</a></li>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Home</a></li>
                </ol>
            </div>
    </div>    
        <?php
}

?>