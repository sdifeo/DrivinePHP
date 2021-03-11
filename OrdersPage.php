<?php
//PHP functions
    require_once "PHP/PHP-Functions-General.php";
    require_once "PHP/PHP-Orders-Functions.php";
    
?>

<?php
createPageHeader("Orders Page", "general_style.css", "orders_page.css");
createNavigationBar();

createOrderTables();

?>
}