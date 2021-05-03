<?php
    define("FOLDER_JAVASCRIPT2", "JAVASCRIPT/");
    define("SEARCH_JAVASCRIPT", FOLDER_JAVASCRIPT2 . "search.js");
    
    require_once "PHP/PHP-Functions-General.php";
    require_once "PHP/PHP-Index-Functions.php";
    require_once "PHP/PHP-Purchases-Functions.php";
   
    set_error_handler("errorManage");
    set_exception_handler("ExceptionManage"); 
    
?>


<script language="javascript" type="text/javascript" src='<?php echo SEARCH_JAVASCRIPT ?>'></script>

<?php
createPageHeader("Purchases", "purchases_style.css", "general_style.css", "blackBG", "ModalJS.js");
createNavigationBar();
?>

<?php
createPurchasesForm();
?>

