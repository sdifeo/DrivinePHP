<?php
    require_once "PHP/PHP-Functions-General.php";
    require_once "PHP/PHP-Index-Functions.php";
    require_once "PHP/PHP-Account-Functions.php";
    require_once "JAVASCRIPT/ModalJS.js";
    set_error_handler("errorManage");
    set_exception_handler("ExceptionManage"); 
?>

<?php
createPageHeader("Home Page", "account_page_style.css", "general_style.css", "blackBG", "ModalJS.js");
createNavigationBar();
?>

<?php
createRegistrationForm();
?>

