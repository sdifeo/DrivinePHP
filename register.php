<?php
    require_once "PHP/PHP-Functions-General.php";
    require_once "PHP/PHP-Index-Functions.php";
    require_once "PHP/PHP-Register-Functions.php";
    require_once "JAVASCRIPT/ModalJS.js";
    set_error_handler("errorManage");
    set_exception_handler("ExceptionManage"); 
?>

<?php
createPageHeader("Home Page", "register_page.css", "general_style.css", "blackBG", "ModalJS.js");
createNavigationBar();
?>

<?php
createRegistrationForm();
?>