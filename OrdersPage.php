<?php
//PHP functions
    require_once "PHP/PHP-Functions-General.php";
    require_once "PHP/PHP-Orders-Functions.php";
    set_error_handler("errorManage");
    set_exception_handler("ExceptionManage"); 

    
?>

    <?php
    $bgColour = "blackBG";
    if(isset($_GET["command"]) && $_GET["command"]=="print")
    {
        $bgColour = "whiteBG";
    }
    
    createPageHeader("Orders Page", "general_style.css", "orders_page.css", $bgColour);
    createNavigationBar();
    createOrderTables();
    createDownload();
    
    ?>

<?php
generateFooter();
?>
}