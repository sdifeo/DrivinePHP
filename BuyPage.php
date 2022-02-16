<?php
    require_once "PHP/PHP-Functions-General.php";
    require_once "PHP/PHP-Buypage-Functions.php";
    
    
set_error_handler("errorManage");
set_exception_handler("ExceptionManage"); 

?>

<?php
createPageHeader("BuyPage", "general_style.css", "buying_page_style.css", "blackBG","ModalJS.js");
createNavigationBar();
?>

<?php
createBuyingForm();
generateFooter();

?>
